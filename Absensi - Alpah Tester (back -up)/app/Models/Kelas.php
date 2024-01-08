<?php

namespace App\Models;

use App\Http\Middleware\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class Kelas extends Model
{
    use HasFactory;
    use SearchableTrait;
    protected $guarded = [];
    protected $table = 'kelas';
    protected $searchable = [
        'columns' => [
            'smester' => 10,
        ],
    ];


    /**
     * Get the user that owns the Kelas
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
    // public function siswa(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'siswa_id')->withDefault();
    // }


    /**
     * Get the user that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guru_id')->withDefault();
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
     * Get the user that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapel(): BelongsTo
    {
        return $this->belongsTo(mapel::class, 'mapel_id')->withDefault();
    }

    /**
     * Get all of the comments for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peserta(): HasMany
    {
        return $this->hasMany(Peserta::class);
    }

    
    /**
     * Get all of the comments for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pertemuan(): HasMany
    {
        return $this->hasMany(Pertemuan::class);
    }

    
}
