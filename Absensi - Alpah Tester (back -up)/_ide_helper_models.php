<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Absensi
 *
 * @property int $id
 * @property int $siswa_id
 * @property string $status
 * @property int $kelas_id
 * @property int $pertemuan_id
 * @property string $absen_oleh
 * @property string $absen_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pertemuan|null $pertemuan
 * @method static \Database\Factories\AbsensiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereAbsenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereAbsenOleh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi wherePertemuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absensi whereUpdatedAt($value)
 */
	class Absensi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Guru
 *
 * @property int $id
 * @property int|null $guru_id
 * @property int $NUPTK
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $guru
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\GuruFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereNUPTK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereUserId($value)
 */
	class Guru extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kelas
 *
 * @property int $id
 * @property int|null $guru_id
 * @property int|null $ruang_id
 * @property int|null $mapel_id
 * @property int $smester
 * @property string $tahun
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $guru
 * @property-read \App\Models\mapel|null $mapel
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pertemuan[] $pertemuan
 * @property-read int|null $pertemuan_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Peserta[] $peserta
 * @property-read int|null $peserta_count
 * @property-read \App\Models\Ruang|null $ruang
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\KelasFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereRuangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereSmester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUserId($value)
 */
	class Kelas extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pertemuan
 *
 * @property int $id
 * @property int|null $kelas_id
 * @property string $tanggal
 * @property int|null $guru_id
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property string $topik
 * @property int|null $ruang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Absensi|null $absensi
 * @property-read \App\Models\User|null $guru
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Peserta[] $peserta
 * @property-read int|null $peserta_count
 * @property-read \App\Models\Ruang|null $ruang
 * @property-read \App\Models\User|null $siswa
 * @method static \Database\Factories\PertemuanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereRuangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereTopik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereWaktuMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pertemuan whereWaktuSelesai($value)
 */
	class Pertemuan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Peserta
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $kelas_id
 * @property int|null $pertemuan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Kelas[] $kelass
 * @property-read int|null $kelass_count
 * @property-read \App\Models\mapel|null $mapel
 * @property-read \App\Models\Pertemuan|null $pertemuan
 * @property-read \App\Models\User|null $siswa
 * @method static \Database\Factories\PesertaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta wherePertemuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peserta whereUpdatedAt($value)
 */
	class Peserta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ruang
 *
 * @property int $id
 * @property int|null $guru_id
 * @property string $nama
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $guru
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\RuangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereUserId($value)
 */
	class Ruang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $akses
 * @property string|null $nohp
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAkses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\mapel
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Peserta|null $peserta
 * @method static \Database\Factories\mapelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|mapel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|mapel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|mapel query()
 * @method static \Illuminate\Database\Eloquent\Builder|mapel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|mapel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|mapel whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|mapel whereUpdatedAt($value)
 */
	class mapel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\siswa
 *
 * @property int $id
 * @property int|null $siswa_id
 * @property int $NISN
 * @property string $jurusan
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Pertemuan|null $pertemuan
 * @property-read \App\Models\Ruang|null $ruang
 * @property-read \App\Models\User|null $siswa
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\siswaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|siswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|siswa whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|siswa whereNISN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|siswa whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|siswa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|siswa whereUserId($value)
 */
	class siswa extends \Eloquent {}
}

