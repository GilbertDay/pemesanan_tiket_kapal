<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Penumpang;
use App\Models\User;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    public function index($id){

        $transaksi = Transaksi::find($id);
        $idPenumpang = explode(',',$transaksi->penumpang_id); //pisahkan string menjadi array
        $dataPenumpang = [];

        foreach($idPenumpang as $id){
            $data = Penumpang::find($id);
            if ($data) {
                $dataPenumpang[] = $data;
            }
        }

        return view('frontend.detailPesanan', compact('transaksi', 'dataPenumpang'));
    }
}
