<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penumpang;


class PembayaranController extends Controller
{
    public function index(Request $req){
        //Fungsi untuk Menambah Penumpang di Tabel Penumpang
        for ($i = 0; $i < $req->jumlah_penumpang; $i++){
            $checkData = Penumpang::find($req->nik_penumpang[$i]);
            if(!$checkData){
                Penumpang::create([
                    'id' => $req->nik_penumpang[$i],
                    'nama' => $req->nama_penumpang[$i],
                    'jenis_kelamin' => 'Laki-Laki',
                    'nama_instansi' => $req->layanan == 'carter' ? $req->nama_instansi : '',
                    'alamat' => $req->alamat[$i],
                    'no_telp' => $req->no_telp[$i],
                    'no_telp_darurat' => $req->no_telp_darurat[$i],
                ]);
            }
        }

        //Fungsi untuk Menambah Penumpang di Tabel Penumpang
        


        return view('frontend.pembayaran');
    }
}
