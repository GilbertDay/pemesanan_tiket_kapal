<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthentikasiController extends Controller
{
    public function cekLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil, redirect ke halaman dashboard atau home

            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/'); // Jika pengguna adalah admin, arahkan ke halaman admin
                    break;
                case 'user':
                    return redirect()->intended('/'); // Jika pengguna adalah kader, arahkan ke halaman kader
                    break;
                default:
                    return redirect()->intended('/');// Jika status tidak sesuai dengan yang diharapkan, kembali ke halaman login
            }

        }
        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ]);

    }

    public function tambahUser(Request $request){

        return view('register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
