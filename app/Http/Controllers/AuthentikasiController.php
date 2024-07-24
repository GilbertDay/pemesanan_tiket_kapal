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
                    return redirect()->intended('/admin/dashboard'); // Jika pengguna adalah admin, arahkan ke halaman admin
                    break;
                case 'user':
                    return redirect()->intended('/'); // Jika pengguna adalah kader, arahkan ke halaman kader
                    break;
                default:
                    return redirect()->intended('/'); // Jika status tidak sesuai dengan yang diharapkan, kembali ke halaman login
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


        return redirect('/login')->with('success', 'Berhasil Registrasi, Silahkan Login');


    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
