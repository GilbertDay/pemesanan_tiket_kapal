<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use App\Models\MetodePembayaran;
use App\Models\Penumpang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use DateTime;
use IntlDateFormatter;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $req) {

        $jumlah_penumpang = $req->dataInput['jumlah_penumpang'];
        $jadwal = Jadwal::find($req->id);
        $metodePembayaran = MetodePembayaran::all();

        $layanan = $req->dataInput['layanan'];
        $tanggalBerangkat = $this->formatTanggal($jadwal['tgl_berangkat']);

        return view('frontend.booking',compact('jumlah_penumpang','tanggalBerangkat','layanan','jadwal', 'metodePembayaran'));
    }

    // Convert tanggal
    public function formatTanggal($tanggal){
        $date = new DateTime($tanggal);
        setlocale(LC_TIME, 'id_ID'); // Mengatur locale untuk bahasa Indonesia
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, 'EEEE, dd MMMM yyyy'); // Membuat formatter untuk tanggal dalam format yang diinginkan
        $tanggalBerangkat = $formatter->format($date);  // Format tanggal menggunakan formatter

        return $tanggalBerangkat;
    }

    public function createOrders(Request $req){


        $id_penumpang = [];
        //Fungsi untuk Menambah Penumpang di Tabel Penumpang
        for ($i = 0; $i < $req->jumlah_penumpang; $i++){
            array_push($id_penumpang, $req->nik_penumpang[$i]);
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

        Jadwal::find($req->id_jadwal)->update([
            'tiket_tersedia' => $req->layanan == 'carter' ? DB::raw(0) : DB::raw('tiket_tersedia - ' . $req->jumlah_penumpang)
        ]);



        Transaksi::create([
            'user_id' => $req->id_user,
            'penumpang_id' => implode(',', $id_penumpang),
            'jadwal_id' => $req->id_jadwal,
            'metode_pembayaran_id' => $req->metodePembayaran,
            'biaya_penanganan' => $req->biaya_penanganan,
            'status' => 'pending',
            'jenis_layanan' => $req->layanan == 'pesanan_pribadi' ? 'Reguler' : 'Carter',
            'jumlah_kursi' => $req->jumlah_penumpang,
            'harga' => $req->harga_tiket,
            'diskon' => $req->diskon,
            'total' => $req->total,
        ]);



        //Fungsi untuk Menambah Penumpang di Tabel Penumpang
        return redirect('/riwayatPesanan');
    }
}
