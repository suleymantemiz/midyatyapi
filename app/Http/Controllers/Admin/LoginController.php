<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Giriş formu göster
    public function showLoginForm()
    {
        return view('admin.auth.login');  // login form blade dosyanız
    }

    // Giriş işlemi
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');  // giriş sonrası yönlendirilecek sayfa
        }

        return back()->withErrors([
            'email' => 'Giriş bilgileri yanlış.',
        ])->onlyInput('email');
    }

    // Çıkış işlemi
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
