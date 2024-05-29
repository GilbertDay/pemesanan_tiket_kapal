<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ListJadwalController extends Controller
{
    public function index(Request $req) {
        $data = User::find('USER-1');
        dd($data);
        $penumpang = $req->inputData['jumlah_penumpang'];
        $tanggal = $req->inputData['tanggal'];
        $layanan = $req->inputData['layanan'];
        return view('frontend.list', compact('penumpang','tanggal','layanan'));
    }
}
