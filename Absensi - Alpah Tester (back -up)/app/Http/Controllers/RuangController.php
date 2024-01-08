<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\Ruang as model;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRuangRequest;
use App\Http\Requests\UpdateRuangRequest;

class RuangController extends Controller
{
    private $viewIndex = 'ruang_index';
    private $viewCreate = 'ruang_form';
    private $viewEdit = 'ruang_form';
    private $viewshow = 'ruang_show';
    private $routePrefix = 'ruang';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = Ruang::query();
        if ($request->filled('q')) {
            $models = $models->search($request->q)->paginate(50);
        }else{
            $models = $models->latest()->paginate(10);
        }
        return view(
            'ruang.' . $this->viewIndex, [
            'models' => $models,
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Ruang',
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
            'title' => 'Form Tambah Ruang',
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
        ];
        return view('ruang.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRuangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRuangRequest $request)
    {
        $requestData = $request->validate([
            'guru_id' => 'nullable',
            'nama' => 'required',
        ]);
        $requestData ['user_id'] = auth()->user()->id;
        Model::create($requestData);
        flash('Data Telah Di Simpan');
        return redirect()->route('ruang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruang  $ruang
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
            'title' => 'Form Ubah Data Ruang Kelas',
            'button' => 'UPDATE',
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
        ];
        return view('ruang.'.$this->viewEdit, $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRuangRequest  $request
     * @param  \App\Models\Ruang  $ruang
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
        return redirect()->route('ruang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruang  $ruang
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
