<?php

namespace App\Http\Controllers;

use DateTime;
use IntlDateFormatter;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $req) {
        // dd($req);
        $jumlah_penumpang = $req->dataInput['jumlah_penumpang'];
        $id_kapal = $req->id;
        $tanggal = $req->dataInput['tanggal'];
        $layanan = $req->dataInput['layanan'];
        $tanggalBerangkat = $this->formatTanggal($tanggal);

        return view('frontend.booking',compact('id_kapal','jumlah_penumpang','tanggalBerangkat','layanan'));
    }

    // Convert tanggal
    public function formatTanggal($tanggal){
        $date = new DateTime($tanggal);
        setlocale(LC_TIME, 'id_ID'); // Mengatur locale untuk bahasa Indonesia
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, 'EEEE, dd MMMM yyyy'); // Membuat formatter untuk tanggal dalam format yang diinginkan
        $tanggalBerangkat = $formatter->format($date);  // Format tanggal menggunakan formatter

        return $tanggalBerangkat;
    }
}
