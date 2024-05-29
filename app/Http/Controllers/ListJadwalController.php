<?php

namespace App\Http\Controllers;
use App\Models\Speedboat;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class ListJadwalController extends Controller
{
    public function index(Request $req) {
        $listjadwal = Jadwal::where('tgl_berangkat',$req->inputData['tanggal'])->get();
        $penumpang = $req->inputData['jumlah_penumpang'];
        $tanggal = $req->inputData['tanggal'];
        $layanan = $req->inputData['layanan'];
        return view('frontend.list', compact('penumpang','tanggal','layanan','listjadwal'));
    }
}
