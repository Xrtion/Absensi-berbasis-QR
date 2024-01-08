<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login_corona');
    }

    public function showLoginFormGuru()
    {
        return view('auth.login_corona_guru');
    }

    public function showLoginFormSiswa()
    {
        return view('auth.login_corona_siswa');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticated(Request $request, $user)
    {
        if ($user->akses == 'operator') {
            return redirect()->route('operator.beranda');
        } elseif ($user->akses == 'guru') {
            return redirect()->route('guru.beranda');
        } elseif ($user->akses == 'siswa') {
            return redirect()->route('tamsiswa.index');
        } else {
            Auth::user()->logout();
            flash('Anda Tidak Memiliki Akses Di Sini')->error();
            return redirect()->route('login');
        }
    } 
}
