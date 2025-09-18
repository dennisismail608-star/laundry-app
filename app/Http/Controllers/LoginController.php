<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.']);
        }

        // Cek password tanpa bcrypt
        if ($user->password !== $request->password) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        // Login user
        Auth::login($user);

        return redirect()->route('content.dashboard')->with('success', 'Login berhasil!');
    }
}
