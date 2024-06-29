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


        $tanggalBerangkat = Carbon::parse($req->inputData['tanggal'])->startOfDay();

        $tanggalSekarang = Carbon::now()->startOfDay();
        $mytime = Carbon::now()->format('d-m-Y');

        $selisihWaktu = $tanggalSekarang->diffInDays($tanggalBerangkat) - 1;

        if(count($listjadwal) != 0) {
            if ($selisihWaktu <= 1){
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.15')]);
            }else if($selisihWaktu <= 3){
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.05')]);

            }
        }
        return view('frontend.list', compact('penumpang','tanggal','layanan','listjadwal'));
    }
}
