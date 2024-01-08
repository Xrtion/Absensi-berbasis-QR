<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class SiswaAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/dashboard'); // Ubah '/dashboard' sesuai dengan rute yang sesuai
        } else {
            // Login gagal
            return back()->withErrors([
                'message' => 'Username atau password salah.',
            ]);
        }
    }
}
