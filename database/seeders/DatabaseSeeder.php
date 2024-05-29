<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Penumpang;
use App\Models\Speedboat;
use App\Models\Transaksi;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // USER-1(id)
        User::create([
            'name'	=> 'Mayu',
            'email'	=> 'srimayufara@gmail.com',
            'no_telp' => '085217331557',
            'password'	=> bcrypt('12345678'),
            'role' => 'user'
        ]);
        //USER-2 (id)
        User::create([
            'name'	=> 'Admin',
            'email'	=> 'admin@gmail.com',
            'no_telp' => '085217331558',
            'password'	=> bcrypt('admin'),
            'role' => 'admin'
        ]);

        // SPD-1 (id)
        Speedboat::create([
            'nama_speedboat' => 'Sakina Putri',
            'kapasitas_kursi' => '30',
            'harga'	=> '75.000',
        ]);

        // SPD-2 (id)
        Speedboat::create([
            'nama_speedboat' => 'Palamae Express',
            'kapasitas_kursi' => '30',
            'harga'	=> '50.000',
        ]);


        // Jadwal

        // JDWL-1 (id)
        Jadwal::create([
            'speedboat_id' => 'SPD-1',
            'pel_asal' => 'Jailolo',
            'pel_tujuan'	=> 'Ternate',
            'tgl_berangkat'	=> '2024-05-31',
            'jam_brgkt'	=> '08:00:00',
            'jam_tiba'	=> '09:00:00',
        ]);

        // JDWL-2 (id)
        Jadwal::create([
            'speedboat_id' => 'SPD-2',
            'pel_asal' => 'Jailolo',
            'pel_tujuan'	=> 'Ternate',
            'tgl_berangkat'	=> '2024-05-31',
            'jam_brgkt'	=> '07:00:00',
            'jam_tiba'	=> '08:00:00',
        ]);

        // JDWL-3 (id)
        Jadwal::create([
            'speedboat_id' => 'SPD-1',
            'pel_asal' => 'Ternate',
            'pel_tujuan'	=> 'Jailolo',
            'tgl_berangkat'	=> '2024-05-30',
            'jam_brgkt'	=> '10:00:00',
            'jam_tiba'	=> '11:00:00',
        ]);

        Penumpang::create([
            'id' => '5304122310020001',
            'nama' => 'Teguh',
            'nama_instansi' => '',
            'jenis_kelamin'	=> 'Laki-Laki',
            'alamat'	=> 'Gejayan',
            'no_telp' => '085217331558',
            'no_telp_darurat' => '085217331124',
        ]);

        Transaksi::create([
            'user_id' => 'USER-1',
            'penumpang_id' => '5304122310020001',
            'jadwal_id'	=> 'JDWL-1',
            'biaya_penanganan'	=> '2024-01-12',
            'status' => 'Ternate',
            'jenis_layanan'	=> 'Reguler',
            'jumlah_kursi' => '2',
            'harga'	=> '150000',
            'diskon' => '0',
            'total'	=> '150000',

        ]);

    }
}
