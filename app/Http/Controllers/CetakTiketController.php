<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Penumpang;
use PDF;

class CetakTiketController extends Controller
{
    public function index(Request $req){
        $findTiket = Transaksi::find($req->id);
        $idPenumpang = explode(',',$findTiket->penumpang_id); //pisahkan string menjadi array
        $dataPenumpang = [];

        foreach($idPenumpang as $id){
            $data = Penumpang::find($id);
            if ($data) {
                $dataPenumpang[] = $data;
            }
        }
        $datas = [
            'titleRight' => 'Dishub Halbar', //ubah title bis
            'titleLeft' => 'Pemesanan Tiket Speedboat' ,
            'dataPenumpang' => $dataPenumpang,
            'data' => $findTiket,
        ];


        $pdf = PDF::loadview('frontend.cetakTiket',$datas);
	    return $pdf->stream();
        // return view('frontend.lihatTiket');
    }
}
