<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Transaksi;
use Carbon\Carbon;


class InfoTransaksiHarianChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $dataTrxSukses = Transaksi::whereDate('created_at', Carbon::today())
        ->where('status', 'success')
        ->get();

        $dataTrxPending = Transaksi::whereDate('created_at', Carbon::today())
        ->where('status', 'pending')
        ->get();


        return $this->chart->pieChart()
            ->addData([count($dataTrxSukses), count($dataTrxPending)])
            ->setLabels(['Transaksi Sukses', 'Transaksi Pending']);
    }
}
