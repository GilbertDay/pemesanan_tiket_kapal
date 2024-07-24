<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
                    return redirect()->intended('/admin/dashboard');
                    break;
                case 'user':
                    return redirect()->intended('/');
                default:
                    return redirect()->intended('/');
            }
        }
        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ]);
    }

    public function tambahUser(Request $req)
    {

        User::create([
            'id' => $req->nik,
            'name' => $req->nama,
            'email' => $req->email,
            'no_telp' => $req->nik,
            'password' => Hash::make($req->password),
            'role' => 'user',
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil, redirect ke halaman dashboard atau home
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/admin/dashboard');
                case 'user':
                    return redirect()->intended('/');
                default:
                    return redirect()->intended('/');
            }
        }

        // Jika login otomatis gagal, kembali dengan pesan error
        return redirect('/')->withErrors([
            'email' => 'Gagal login setelah registrasi.',
        ]);

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
