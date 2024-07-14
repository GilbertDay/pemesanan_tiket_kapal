@extends('layouts.master')

@section('title', 'Riwayat Pesanan')

@section('content')

<body class="bg-[#151F57] py-5 px-10 ">
    <nav class="flex justify-between text-2xl">
        <a href="/" class="font-bold text-white no-underline">
            DisHub Hal-Bar
        </a>
    </nav>

    <div class="flex flex-col gap-4 mt-20">

        @foreach($orders as $order)

        <div class="w-full bg-white text-[#151F57] font-semibold p-3  rounded-xl">
            <div class="flex justify-between mb-16">
                <div class="grow">
                    <div class="mb-4">Tanggal Order : {{date('d-m-Y H:m', strtotime($order->created_at))}} WIB
                    </div>
                    <div class="flex gap-3 text-2xl">
                        <div>{{$order->jadwal->pel_asal}}</div>
                        <div>-</div>
                        <div>{{$order->jadwal->pel_tujuan}}</div>
                        <div>( {{$order->jumlah_kursi}} Tiket )</div>
                    </div>
                    <div class="mt-3">
                        <div>Waktu Keberangkatan : {{$order->jadwal->jam_brgkt}} - {{$order->jadwal->jam_tiba}}
                        </div>
                        <div class="mt-2">Tiket Reguler</div>
                    </div>
                </div>
                <form action='/detailPesanan/{{$order->id}}' method="POST">
                    @csrf
                    <input type="text" value="{{$order->id}}" name="id_trx" hidden>
                    <button class="h-full p-4 rounded-lg hover:text-white hover:bg-gray-600">
                        Lihat Detail Pesanan
                    </button>
                </form>
            </div>
            <div class="flex gap-3 ">
                <div
                    class="flex items-center p-2 justify-center rounded-md grow {{$order->status == 'pending' ? 'bg-yellow-500' : 'bg-green-500'}}">
                    {{$order->status == 'pending' ? 'Menunggu Pembayaran' : 'Pembayaran Berhasil' }}
                </div>
                @if($order->status != 'pending')
                <!-- <div class="p-2 px-6 text-white bg-gray-500 rounded-md">Cetak Tiket</div> -->
                <form action="/cetakTiket/{{$order->id}}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 px-6 bg-[#151F57] rounded-md text-white ">Cetak Tiket</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

</body>
@endsection
