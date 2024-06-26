<?php

namespace App\Http\Controllers;
use App\Models\Penumpang;
use App\Models\Jadwal;
use App\Models\Speedboat;
use App\Models\Transaksi;
use App\Models\MetodePembayaran;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dahsboard()
    {
        $data_penumpang = Penumpang::count();
        $data_speedboat = Speedboat::count();
        $data_jadwal = Jadwal::count();
        $data_transaksi = Transaksi::count();
        return view('backend.index',compact('data_penumpang','data_speedboat','data_jadwal','data_transaksi') );
    }

    public function penumpang()
    {
        $penumpang = Penumpang::all();
        return view('backend.penumpang', compact('penumpang'));
    }
    public function jadwal()
    {
        $jadwal = Jadwal::all();
        $speedboat = Speedboat::all();
        return view('backend.jadwal', compact('jadwal','speedboat'));
    }
    public function tambahJadwal(Request $req){
        // dd($req);
        Jadwal::create([
            'speedboat_id' => $req->speedboat,
            'pel_asal' => $req->pel_asal,
            'pel_tujuan' => $req->pel_tujuan,
            'tgl_berangkat' => $req->tgl_berangkat,
            'jam_brgkt' => $req->jam_brgkt,
            'jam_tiba' => $req->jam_tiba,
        ]);
        return redirect('/admin/jadwal');
    }

    public function transaksi()
    {
        $transaksi_sukses = Transaksi::where('status','success')->get();
        $transaksi_pending = Transaksi::where('status','pending')->get();

        return view('backend.transaksi', compact('transaksi_sukses','transaksi_pending'));
    }
    public function speedboat()
    {
        $speedboat = Speedboat::all();
        return view('backend.speedboat', compact('speedboat'));
    }

    public function metodePembayaran()
    {
        $metodePembayaran = MetodePembayaran::all();
        return view('backend.metode_pembayaran', compact('metodePembayaran'));
    }
}
