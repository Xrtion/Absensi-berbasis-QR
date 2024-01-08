<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pertemuan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function ruang(): BelongsTo
    {
        return $this->belongsTo(Ruang::class, 'ruang_id')->withDefault();
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guru_id')->withDefault();
    }

    public function peserta(): HasMany
    {
        return $this->hasMany(Peserta::class);
    }

    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class, 'status');
    }


}
