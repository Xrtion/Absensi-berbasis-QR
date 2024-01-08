<?php

namespace App\Http\Controllers;

use App\Models\Kelas as model;
use App\Models\Kelas;
use App\Models\User;
use App\Models\siswa as Murid;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\Ruang;

class KelasController extends Controller
{
    private $viewIndex = 'kelas_index';
    private $viewCreate = 'kelas_form';
    private $viewEdit = 'kelas_form';
    private $viewshow = 'kelas_show';
    private $routePrefix = 'kelas';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = Kelas::query();
        if ($request->filled('q')) {
            $models = $models->search($request->q)->paginate(50);
        }else{
            $models = $models->latest()->paginate(10);
        }
        return view(
            'kelas.' . $this->viewIndex,
            [
                'models' => $models,
                'routePrefix' => $this->routePrefix,
                'title' => 'Data Kelas',
            ]
        );
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
            'title' => 'Form Tambah Kelas',
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
            'ruang' => Ruang::pluck('nama', 'id'),
            'mapel' => mapel::pluck('nama', 'id'),
        ];
        return view('kelas.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKelasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelasRequest $request)
    {
        $requestData = $request->validate([
            'guru_id' => 'nullable',
            'ruang_id' => 'nullable',
            'mapel_id' => 'nullable',
            'smester' => 'required',
            'tahun' => 'required',
        ]);
        $requestData['user_id'] = auth()->user()->id;
        Model::create($requestData);
        flash('Data Telah Di Simpan');
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('kelas.' . $this->viewshow, [
            'model' => Kelas::findOrFail($id),
            'title' => 'Detail Kelas',
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
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
            'title' => 'Form Ubah Data Informasi Kelas',
            'button' => 'UPDATE',
            'guru' => User::where('akses', 'guru')->pluck('name', 'id'),
            'ruang' => Ruang::pluck('nama', 'id'),
            'mapel' => mapel::pluck('nama', 'id'),
        ];
        return view('kelas.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelasRequest  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'guru_id' => 'nullable',
            'ruang_id' => 'nullable',
            'mapel_id' => 'nullable',
            'smester' => 'required',
            'tahun' => 'required',
        ]);
        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        flash('Data Telah Diubah');
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $models = Model::findOrFail($id);
        $models->delete();
        flash('Data Berhasil Di Hapus');
        return Back();
    }


    public function scan()
    {
        return view('kelas.kelas_scan');
    }

    public function qr()
    {
        return view('kelas.kelas_qr');
    }
}
