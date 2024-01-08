<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{

    private $viewIndex = 'absensi_index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operator.'.$this->viewIndex, [
            'models' => Absensi::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa_id = $request->input('siswa_id');
        $kelas_id = $request->input('kelas_id');
        $pertemuan_id = $request->input('pertemuan_id');
        foreach ($siswa_id as $id => $value) {
            Absensi::create([
                'siswa_id' => $id,
                'status' => $value,
                'kelas_id' => $kelas_id[$id],
                'pertemuan_id' => $pertemuan_id[$id], 
                'absen_oleh' => Auth::user()->name,
                'absen_at' => date('Y-m-d'),
            ]);
        }
        flash('Absensi Sudah tersimpan');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbsensiRequest  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $models = Absensi::findOrFail($id);
        $models->delete();
        flash('Data Absensi Berhasil Di Hapus');
        return Back();
    }



}
