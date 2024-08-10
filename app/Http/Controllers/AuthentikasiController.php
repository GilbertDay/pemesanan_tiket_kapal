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
        return back()->with('error', 'Email atau password tidak valid.');
    }

    public function tambahUser(Request $req)
    {

        $req->validate([
            'nik' => 'required|unique:users,id|min:14|max:16', // NIK harus unik dan minimal 10 karakter
            'nama' => 'required|string|max:255', // Nama harus diisi dan tidak lebih dari 255 karakter
            'email' => 'required|email|unique:users,email|max:255', // Email harus valid, unik, dan tidak lebih dari 255 karakter
            'no_hp' => 'required|numeric|unique:users,no_telp|digits_between:10,15', // Nomor telepon harus berupa angka dan memiliki panjang antara 10-15 digit
            'password' => 'required|string|min:8', // Password minimal 8 karakter dan harus dikonfirmasi (mencocokkan field password_confirmation)
        ]);

        User::create([
            'id' => $req->nik,
            'name' => $req->nama,
            'email' => $req->email,
            'no_telp' => $req->no_hp,
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
