<?php

namespace App\Http\Controllers;
use App\Models\Speedboat;
use App\Models\Jadwal;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ListJadwalController extends Controller
{
    public function index(Request $req) {
        $tanggal = Carbon::parse($req->inputData['tanggal'])->format('Y-m-d');

        $listjadwal;
        $penumpang = $req->inputData['jumlah_penumpang'];
        $layanan = $req->inputData['layanan'];

        $soldTiket = Jadwal::where('tgl_berangkat',$tanggal)->where('tiket_tersedia', '<', $penumpang)->get(); //menampilkan daftar tiket yang sudah habis atau tiket tersedia kurang dari jumlah penumpang

        if ($layanan == 'carter') {
            //list jadwal jika carter
            $listjadwal = Jadwal::where('tgl_berangkat', $tanggal)
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

        // Menentukan Demand per speed
        $highDemand = Transaksi::join('jadwals', 'transaksis.jadwal_id', '=', 'jadwals.id')
        ->join('speedboats', 'jadwals.speedboat_id', '=', 'speedboats.id')
        ->select('speedboats.nama_speedboat')
        ->groupBy('speedboats.nama_speedboat')
        ->havingRaw('COUNT(*) >= 10') // Minimal 10 kali pesanan baru bisa masuk demand tertinggi
        ->orderByRaw('COUNT(*) DESC')
        ->get();

        // dd($highDemand);


        // Membuat Harga Dinamis
        if(count($listjadwal) != 0) {
            if ($selisihWaktu <= 1 ){
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.15')]); // harga naik 15%
            }else if($selisihWaktu <= 3){
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal * 1.05')]); // harga naik 5%
            }else{
                DB::table('speedboats')->update(['harga' => DB::raw('harga_normal')]); // harga normal
            }

            if (count($highDemand) != 0) {
                DB::table('speedboats')
                    ->whereIn('nama_speedboat', $highDemand)
                    ->update(['harga' => DB::raw('harga * 1.15')]); // harga naik 15%
            }
        }
        $listjadwal = Jadwal::with('speedboat')
            ->where('tgl_berangkat', $tanggal)
            ->orderBy('jam_brgkt', 'asc') // Mengurutkan berdasarkan jam keberangkatan
            ->get();

        return view('frontend.list', compact('penumpang','tanggal','layanan','listjadwal', 'soldTiket'));
    }
}
