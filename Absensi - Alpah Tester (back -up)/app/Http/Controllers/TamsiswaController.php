<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TamsiswaController extends Controller
{
    private $viewIndex = 'tamsiswa_index';
    private $viewCreate = 'tamsiswa_form';
    private $viewEdit = 'tamsiswa_form';
    private $viewshow = 'tamsiswa_show';
    private $routePrefix = 'tamsiswa';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tamsiswa.' . $this->viewIndex, []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function detailshow($id)
    {
        return view('tamsiswa.tamsiswapertemuan_show', [
            'model' => Pertemuan::find($id),
            'title' => 'Detail Pertemuan',
            'absensi' => Absensi::find($id),
        ]);
    }

    public function scan(Request $request)
    {
        // // Mendapatkan ID siswa yang sedang melakukan absensi
        // $siswaId = Auth::user()->id;
        // $kelas_id = $request->input('kelas_id');
        // $pertemuan_id = $request->input('pertemuan_id');

        // // Lakukan logika validasi absensi siswa berdasarkan QR code dan siswa ID
        // // Misalnya, periksa apakah siswa memiliki izin untuk absensi pada pertemuan ini

        // // Jika siswa diperbolehkan absen, simpan data absensi ke database
        // $absensi = Absensi::create([
        //     'siswa_id' => $siswaId,
        //     'status' => 'masuk',
        //     'kelas_id' => $kelas_id,
        //     'pertemuan_id' => $pertemuan_id,
        //     'absen_oleh' => Auth::user()->name,
        //     'absen_at' => date('Y-m-d'),
        //     // Informasi absensi lainnya
        // ]);

        // // Tampilkan pesan sukses absensi
        // flash('Absensi Sudah tersimpan');

        return view('tamsiswa.tamsiswa_scan');
    }

    public function validasi(Request $request)
    {
        $pertemuan_id = $request->pertemuan_id;
        // $kelas_id = Kelas::where('id', $pertemuan_id)->value('kelas_id');
        $siswa_id = Auth::user()->id;
        Absensi::create([
            'siswa_id' => $siswa_id,
            'status' => 'masuk',
            // 'kelas' => $kelas_id,
            'pertemuan_id' => $pertemuan_id,
            'absen_oleh' => 'Siswa',
            'absen_at' => date('Y-m-d'),
        ]);
        return response()->json([
            'status' => 200,
        ]);
        // $qrData = $request->all();
        // return response()->json($qrData);

    }
}
