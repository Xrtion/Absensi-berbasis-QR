<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaGuruController extends Controller
{
    public function index()
    {
        return view('guru.beranda_index');
    }
}
