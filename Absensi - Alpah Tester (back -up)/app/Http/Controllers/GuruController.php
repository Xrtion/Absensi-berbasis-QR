<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Guru as Model;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
    private $viewIndex = 'guru_index';
    private $viewCreate = 'guru_form';
    private $viewEdit = 'guru_form';
    private $viewshow = 'guru_show';
    private $routePrefix = 'guru';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = Guru::query();
        if ($request->filled('q')) {
            $models = $models->search($request->q)->paginate(50);
        }else{
            $models = $models->latest()->paginate(10);
        }
        return view('guru.' . $this->viewIndex, [
            'models' =>  $models,
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Guru',
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
            'title' => 'Form Tambah Guru',
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
        ];
        return view('guru.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'guru_id' => 'nullable',
            'NUPTK' => 'required',
        ]);
        $requestData ['user_id'] = auth()->user()->id;
        Model::create($requestData);
        flash('Data Telah Di Simpan');
        return redirect()->route('guru.index');
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
        $model = Model::find($id);
        if (!$model) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        $data = [
            'model' => $model,
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'title' => 'Form Ubah Data Guru',
            'button' => 'UPDATE',
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
        ];
        return view('guru.' . $this->viewEdit, $data);
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
        $requestData = $request->validate([
            'guru_id' => 'nullable',
            'NUPTK' => 'required',
        ]);
        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        flash('Data Telah Diubah');
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
