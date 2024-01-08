<?php

namespace App\Http\Controllers;

use App\Models\siswa as model;
use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoresiswaRequest;
use App\Http\Requests\UpdatesiswaRequest;
use App\Models\Ruang;
use App\Models\User;

class SiswaController extends Controller
{
    private $viewIndex = 'siswa_index';
    private $viewCreate = 'siswa_form';
    private $viewEdit = 'siswa_form';
    private $viewshow = 'siswa_show';
    private $routePrefix = 'siswa';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = siswa::query();
        if ($request->filled('q')) {
            $models = $models->search($request->q)->paginate(50);
        }else{
            $models = $models->latest()->paginate(10);
        }
        return view(
            'siswa.' . $this->viewIndex, [
            'models' => $models,
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Siswa',
        ]);
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
            'siswa' => User::where('akses', 'siswa')->pluck('name', 'id'),
            'ruang' => Ruang::pluck('nama', 'id'),
        ];
        return view('siswa.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'siswa_id' => 'nullable',
            'NISN' => 'required',
            'jurusan' => 'required',
            'ruang' => 'required'

        ]);
        $requestData ['user_id'] = auth()->user()->id;
        Model::create($requestData);
        flash('Data Telah Di Simpan');
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix.'.update', $id],
            'button' => 'UPDATE',
            'title' => 'Form Edit Siswa',
            'siswa' => User::where('akses', 'siswa')->pluck('name', 'id'),
            'ruang' => Ruang::pluck('nama', 'id'),
        ];
        return view('siswa.'.$this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesiswaRequest  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesiswaRequest $request,$id)
    {
        $requestData = $request->validate([
            'siswa_id' => 'nullable',
            'NISN' => 'required',
            'jurusan' => 'required',
            'ruang_id' => 'required',
        ]);
        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        flash('Data Telah Diubah');
        return redirect()->route('siswa.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Model::find($id);
        $model->delete();
        flash('Data Berhasil Dihapus');
        return redirect()->back();
    }
}
