<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'judul' => 'Masuk',
            'active' => 'masuk'
        ]);
    }

    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 0)
            {
                return redirect('/');
            }
            return redirect('/dashboard');
        }

        return back()->with('loginError', 'Gagal Login!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
