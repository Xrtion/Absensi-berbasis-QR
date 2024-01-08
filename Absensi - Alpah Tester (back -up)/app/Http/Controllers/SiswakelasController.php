<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use App\Models\Peserta as Model;
use Illuminate\Support\Facades\Auth;

class SiswakelasController extends Controller
{
    public function index()
    {
        $siswaid = Auth::user()->id;
        return view(
            'tamsiswa.tamsiswakelas_index',
            [
                'model' => Model::where('siswa_id', $siswaid)->paginate(10),
                'routePrefix' => 'kelaskelas',
                'title' => 'Data Kelas Kamu Smester ini',
            ]
        );
    }

    public function show($id)
    {
        return view('tamsiswa.tamsiswakelas_show', [
            'model' => Kelas::findOrFail($id),
            'title' => 'Detail Kelas Kamu',
            // 'modelss' => Model::find($id),
        ]);
    }

}
