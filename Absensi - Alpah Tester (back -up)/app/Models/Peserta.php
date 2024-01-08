<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id')->where('akses', 'siswa');
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class);
    }

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class);
    }

    public function kelass()
    {
        return $this->belongsToMany(Kelas::class, 'peserta', 'siswa_id', 'kelas_id');
    }

}
