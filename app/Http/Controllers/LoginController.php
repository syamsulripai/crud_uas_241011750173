<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

    $request->session()->regenerate();

    return redirect()
        ->route('mobile.index')
        ->with('success', 'Selamat datang, Anda berhasil login.');
}

return back()
    ->with('error', 'Username atau password salah.')
    ->withInput();
    }

    // Logout
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()
        ->route('login')
        ->with('success', 'Berhasil logout.');
}
}