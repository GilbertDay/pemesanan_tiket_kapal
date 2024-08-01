<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Speedboat;
use App\Models\Jadwal;


class InfoRuteSpeedboatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // $speedboat = Speedboat::all();
        $speedboatNames = Speedboat::orderBy('nama_speedboat','DESC')->pluck('nama_speedboat')->toArray();

        $getJadwalJailolo = Jadwal::join('speedboats', 'jadwals.speedboat_id', '=', 'speedboats.id')
        ->where('jadwals.pel_asal', 'Pelabuhan Laut Jailolo')
        ->select('speedboats.nama_speedboat', \DB::raw('count(*) as jumlah'))
        ->groupBy('speedboats.nama_speedboat')
        ->orderBy('speedboats.nama_speedboat','DESC')
        ->get();

        $getJadwalTernate = Jadwal::join('speedboats', 'jadwals.speedboat_id', '=', 'speedboats.id')
        ->where('jadwals.pel_asal', 'Pelabuhan Bastion Ternate')
        ->select('speedboats.nama_speedboat', \DB::raw('count(*) as jumlah'))
        ->groupBy('speedboats.nama_speedboat')
        ->orderBy('speedboats.nama_speedboat','DESC')
        ->get();

            // Inisialisasi array kosong untuk menyimpan hasil
        $asalJailolo = array_fill(0, count($speedboatNames), 0);
        $asalTernate = array_fill(0, count($speedboatNames), 0);

        // Loop melalui nama-nama speedboat dan set data
        foreach ($speedboatNames as $index => $speedboatName) {
            $found = false;

            foreach ($getJadwalJailolo as $jadwal) {
                if ($jadwal->nama_speedboat === $speedboatName) {
                    // Jika nama speedboat cocok, simpan jumlahnya
                    $asalJailolo[$index] = $jadwal->jumlah;
                    $found = true;
                    break;
                }
            }

            foreach ($getJadwalTernate as $jadwal) {
                if ($jadwal->nama_speedboat === $speedboatName) {
                    // Jika nama speedboat cocok, simpan jumlahnya
                    $asalTernate[$index] = $jadwal->jumlah;
                    $found = true;
                    break;
                }
            }

            // Jika nama speedboat tidak ditemukan dalam data jadwal, tetap simpan 0 (sudah default)
        }


        return $this->chart->barChart()
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Pelabuhan Laut Jailolo - Pelabuhan Bastion Ternate', $asalJailolo)
            ->addData('Pelabuhan Bastion Ternate - Pelabuhan Laut Jailolo',$asalTernate )
            ->setXAxis($speedboatNames);

    }
}
