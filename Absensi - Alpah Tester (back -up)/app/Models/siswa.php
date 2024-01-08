<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Notifications\Notifiable;

class siswa extends Model
{
    use HasFactory;
    use SearchableTrait;
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'NISN' => 10,
        ],
    ];


    /**
     * Get the user that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'siswa_id')->withDefault();
    }


    /**
     * Get the user that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ruang(): BelongsTo
    {
        return $this->belongsTo(Ruang::class, 'ruang_id')->withDefault();
    }

    /**
     * Get the kelas that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id')->withDefault();
    }

        /**
     * Get the kelas that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pertemuan(): BelongsTo
    {
        return $this->belongsTo(Pertemuan::class);
    }
}
