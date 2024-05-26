<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListJadwalController extends Controller
{
    public function index(Request $req) {
        $penumpang = $req->inputData['jumlah_penumpang'];
        $tanggal = $req->inputData['tanggal'];
        $layanan = $req->inputData['layanan'];
        return view('frontend.list', compact('penumpang','tanggal','layanan'));
    }
}
