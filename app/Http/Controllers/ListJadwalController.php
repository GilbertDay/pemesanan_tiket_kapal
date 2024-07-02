<?php

namespace App\Http\Controllers;
use App\Models\Speedboat;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ListJadwalController extends Controller
{
    public function index(Request $req) {
        $listjadwal = Jadwal::where('tgl_berangkat',$req->inputData['tanggal'])->get();
        $penumpang = $req->inputData['jumlah_penumpang'];
        $layanan = $req->inputData['layanan'];
        $tanggal = $req->inputData['tanggal'];

        // Membuat Harga Dinamis
        $tanggalBerangkat = Carbon::parse($tanggal);
        $tanggalSekarang = Carbon::now();
        $selisihWaktu = $tanggalSekarang->diffInDays($tanggalBerangkat);

        if(count($listjadwal) != 0) {
            if ($selisihWaktu <= 1){
                // harga naik 15%
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.15')]);
            }else if($selisihWaktu <= 3){
                // harga naik 5%
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.05')]);
            }
        }
        // Membuat Harga Dinamis

        return view('frontend.list', compact('penumpang','tanggal','layanan','listjadwal'));
    }
}
