<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\Kelas as model;
use App\Models\Kelas;
use App\Models\Pertemuan;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GurukelasController extends Controller
{
    private $viewIndex = 'kelas_index';
    private $viewCreate = 'kelas_form';
    private $viewEdit = 'kelas_form';
    private $viewshow = 'kelas_show';
    private $routePrefix = 'kelas';

    public function index()
    {
        $guruid = Auth::user()->id;
        return view(
            'guru.gurukelas_index',
            [
                'models' => Model::where('guru_id', $guruid)->paginate(10),
                'routePrefix' => 'kelaskelas',
                'title' => 'Data Kelas',
            ]
        );
    }

    public function show($id)
    {
        return view('guru.gurukelas_show', [
            'model' => Kelas::findOrFail($id),
            'title' => 'Detail Kelas',
        ]);
    }

    public function detailshow($id)
    {
        return view('guru.gurupertemuan_show', [
            'model' => Pertemuan::find($id),
            'title' => 'Detail Pertemuan'
        ]);
    }

    public function qr(Request $request)
    {
        return view('guru.guru_qr', [
            'pertemuan_id' => $request->input('pertemuan_id'),
            'kelas_id' => $request->input('kelas_id'),
        ]);
    }
    
    
}