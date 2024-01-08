<?php

namespace App\Http\Controllers;

use App\Models\mapel as model;
use App\Models\mapel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoremapelRequest;
use App\Http\Requests\UpdatemapelRequest;

class MapelController extends Controller
{
    private $viewIndex = 'mapel_index';
    private $viewCreate = 'mapel_form';
    private $viewEdit = 'mapel_form';
    private $viewshow = 'mapel_show';
    private $routePrefix = 'mapel';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = mapel::query();
        if ($request->filled('q')) {
            $models = $models->search($request->q)->paginate(50);
        }else{
            $models = $models->latest()->paginate(10);
        }
        return view(
            'mapel.' . $this->viewIndex, [
            'models' => $models,
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Mata Pelajaran',
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
            'title' => 'Form Tambah Mata Pelajaran',
        ];
        return view('mapel.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremapelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremapelRequest $request)
    {
        $requestData = $request->validate([
            'nama' => 'required',
        ]);
        Model::create($requestData);
        flash('Data Telah Di Simpan');
        return redirect()->route('mapel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Model::find($id);
        if (!$model) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        $data = [
            'model' => $model,
            'method' => 'PUT',
            'route' => [$this->routePrefix.'.update', $id],
            'title' => 'Form Ubah Data Kelas',
            'button' => 'UPDATE',
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
        ];
        return view('mapel.'.$this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemapelRequest  $request
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'guru_id' => 'nullable',
            'nama' => 'required',
        ]);
        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        flash('Data Telah Diubah');
        return redirect()->route('mapel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $models = Model::findOrFail($id);
        $models->delete();
        flash('Data Berhasil Di Hapus');
        return Back();
    }
}
