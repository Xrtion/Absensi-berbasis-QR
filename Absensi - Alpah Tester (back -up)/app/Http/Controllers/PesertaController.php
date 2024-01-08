<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Peserta as Model;
use App\Models\User;

use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;

class PesertaController extends Controller
{
    private $viewIndex = 'peserta_index';
    private $viewCreate = 'peserta_form';
    private $viewEdit = 'peserta_form';
    private $viewshow = 'peserta_show';
    private $routePrefix = 'peserta';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Form Tambah Siswa',
            'kelas_id' => request('kelas_id'),
            // 'pertemuan_id' => request('pertemuan_id'),
            'siswa' => User::where('akses', 'siswa')->pluck('name', 'id'),
        ];
        return view('peserta.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesertaRequest $request)
    {
        Peserta::create($request->validated());
        flash('Data Berhasil Di Simpan');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesertaRequest  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesertaRequest $request, Peserta $peserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function hapus($id)
    {
        $peserta = Model::findOrFail($id);
        $peserta->delete();
        flash('Data Siswa Telah di Hapus');
        return back();
    }
}
