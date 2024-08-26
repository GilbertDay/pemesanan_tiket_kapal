<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Auth;


class RiwayatPemesanan extends Controller
{
    public function index() {
        $orders = Transaksi::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('frontend.riwayat_pesanan', compact('orders'));
    }

    public function uploadBuktiBayar(Request $req){
        $fileName = time().$req->file('bukti_bayar')->getClientOriginalName();
        $path = $req->file('bukti_bayar')->storeAs('bukti_bayar', $fileName, 'public');

        Transaksi::find($req->transaksi_id)->update(['bukti_bayar' => '/storage/'.$path]);

        return redirect('/');
    }

}
