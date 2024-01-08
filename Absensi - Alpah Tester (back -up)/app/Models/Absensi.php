<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'siswa_id',
        'status', 
        'kelas_id',
        'pertemuan_id', 
        'absen_oleh',
        'absen_at'
    ];


    public function pertemuan(): BelongsTo
    {
        return $this->belongsTo(Pertemuan::class)->withDefault();
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class)->withDefault();
    }
}
