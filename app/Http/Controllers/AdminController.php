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
        $penumpang = Penumpang::paginate(10);
        return view('backend.penumpang', compact('penumpang'));
    }
    public function jadwal()
    {
        $jadwal = Jadwal::orderBy('id', 'desc')->paginate(5);
        $speedboat = Speedboat::all();
        return view('backend.jadwal', compact('jadwal','speedboat'));
    }
    public function tambahJadwal(Request $req){
        $speedboat = Speedboat::find($req->speedboat);
        Jadwal::create([
            'speedboat_id' => $req->speedboat,
            'pel_asal' => $req->pel_asal,
            'pel_tujuan' => $req->pel_tujuan,
            'tgl_berangkat' => $req->tgl_berangkat,
            'jam_brgkt' => $req->jam_brgkt,
            'jam_tiba' => $req->jam_tiba,
            'tiket_tersedia' => $speedboat->kapasitas_kursi,
        ]);
        return redirect('/admin/jadwal');
    }

    public function tambahSpeedboat(Request $req){
        Speedboat::create([
            'nama_speedboat' => $req->nama_speedboat,
            'kapasitas_kursi' => $req->kapasitas_kursi,
            'harga' => $req->harga_speedboat,
            'harga_normal' => $req->harga_speedboat,
        ]);
        return redirect('/admin/speedboat');
    }

    public function tambahMetodePembayaran(Request $req){
        $fileName = time().$req->file('logo_bank')->getClientOriginalName();
        $path = $req->file('logo_bank')->storeAs('logo_bank', $fileName, 'public');

        MetodePembayaran::create([
            'nama_bank' => $req->nama_bank,
            'no_rek' => $req->nomor_rekening,
            'nama_rekening' => $req->nama_rekening,
            'img' => '/storage/'.$path,
        ]);
        return redirect('/admin/metodePembayaran');
    }

    public function transaksi()
    {
        $transaksi_all = Transaksi::all();
        $transaksi_sukses = Transaksi::where('status','success')->get();
        $transaksi_pending = Transaksi::where('status','pending')->get();

        return view('backend.transaksi', compact('transaksi_sukses','transaksi_pending','transaksi_all'));
    }

    public function acceptTransaksi(Request $req){
        $transaksi = Transaksi::find($req->id)->update(['status' => 'success']);
        return redirect('/admin/transaksi');
    }

    public function rejectTransaksi(Request $req){
        $transaksi = Transaksi::find($req->id)->update(['status' => 'reject']);
        return redirect('/admin/transaksi');
    }

    public function speedboat()
    {
        $speedboat = Speedboat::orderBy('id', 'desc')->paginate(5);
        return view('backend.speedboat', compact('speedboat'));
    }

    public function metodePembayaran()
    {
        $metodePembayaran = MetodePembayaran::all();
        return view('backend.metode_pembayaran', compact('metodePembayaran'));
    }
}
