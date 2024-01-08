<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan;
use App\Models\User;
use App\Http\Requests\StorePertemuanRequest;
use App\Http\Requests\UpdatePertemuanRequest;
use App\Models\Kelas;
use App\Models\Ruang;

class PertemuanController extends Controller
{
    private $viewIndex = 'pertemuan_index';
    private $viewCreate = 'pertemuan_form';
    private $viewEdit = 'pertemuan_form';
    private $viewshow = 'pertemuan_show';
    private $routePrefix = 'pertemuan';
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
            'model' => new Pertemuan(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Form Tambah Pertemuan',
            'kelas_id' => request('kelas_id'),
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
            'ruang' => Ruang::pluck('nama','id'),
        ];
        return view('pertemuan.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePertemuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePertemuanRequest $request)
    {
        Pertemuan::create($request->validated());
        flash('Pertemuan Berhasil Di Buat');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pertemuan.' . $this->viewshow, [
            'model' => Pertemuan::findOrFail($id),
            'title' => 'Detail Pertemuan',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertemuan $pertemuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePertemuanRequest  $request
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePertemuanRequest $request, Pertemuan $pertemuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertemuan $pertemuan)
    {
        //
    }

    public function hapus($id)
    {
        $pertemuan = Pertemuan::findOrFail($id);
        $pertemuan->delete();
        flash('Pertemuan Telah di Hapus');
        return back();
    }
}
