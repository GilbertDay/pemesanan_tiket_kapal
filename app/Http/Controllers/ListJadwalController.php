<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListJadwalController extends Controller
{
    public function index(Request $req) {
        $penumpang = $req->jumlah_penumpang;
        return view('frontend.list', compact('penumpang'));
    }
}
