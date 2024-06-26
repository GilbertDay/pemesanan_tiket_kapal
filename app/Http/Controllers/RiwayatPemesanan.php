<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Auth;


class RiwayatPemesanan extends Controller
{
    public function index() {
        $orders = Transaksi::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('frontend.riwayat_pesanan', compact('orders'));
    }
}
