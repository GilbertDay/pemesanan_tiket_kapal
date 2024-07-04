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
        $tanggal = $req->inputData['tanggal'];
        $listjadwal;
        $penumpang = $req->inputData['jumlah_penumpang'];
        $layanan = $req->inputData['layanan'];

        $soldTiket = Jadwal::where('tgl_berangkat',$tanggal)->where('tiket_tersedia', '<', $penumpang)->get(); //menampilkan daftar tiket yang sudah habis atau tiket tersedia kurang dari jumlah penumpang

        if ($layanan == 'carter') {
            //list jadwal jika carter
            $listjadwal = Jadwal::where('tgl_berangkat', $req->inputData['tanggal'])
                                ->whereHas('speedboat', function($query) {
                                    $query->whereColumn('kapasitas_kursi', 'tiket_tersedia'); // bandingkan kapasitas kursi dengan jumlah tiket tersedia di tabel jadwal
                                })->get();
        }else {
            $listjadwal = Jadwal::where('tgl_berangkat',$tanggal)->where('tiket_tersedia', '>=', $penumpang)->get(); //list jadwal default penumpang reguler
        }

        // Membuat Harga Dinamis
        $tanggalBerangkat = Carbon::parse($tanggal);
        $tanggalSekarang = Carbon::now();
        $selisihWaktu = $tanggalSekarang->diffInDays($tanggalBerangkat);

        if(count($listjadwal) != 0) {
            if ($selisihWaktu <= 1){
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.15')]); // harga naik 15%
            }else if($selisihWaktu <= 3){
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.05')]); // harga naik 5%
            }else{
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal')]); // harga naik 5%
            }
        }
        // Membuat Harga Dinamis

        return view('frontend.list', compact('penumpang','tanggal','layanan','listjadwal', 'soldTiket'));
    }
}
