<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use DateTime;
use IntlDateFormatter;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $req) {
        $jumlah_penumpang = $req->dataInput['jumlah_penumpang'];
        $jadwal = Jadwal::find($req->id);

        $layanan = $req->dataInput['layanan'];
        $tanggalBerangkat = $this->formatTanggal($jadwal['tgl_berangkat']);

        return view('frontend.booking',compact('jumlah_penumpang','tanggalBerangkat','layanan','jadwal'));
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
