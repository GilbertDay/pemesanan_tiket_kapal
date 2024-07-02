@extends('layouts.master')

@section('title', 'Detail Pesanan')

@section('content')
@inject('carbon', 'Carbon\Carbon')

<body class="bg-[#151F57] py-5 px-10 ">
    <nav class="flex justify-between text-2xl">
        <a href="/" class="font-bold text-white no-underline">
            DisHub Hal-Bar
        </a>
    </nav>

    <div class="flex flex-col gap-3 mt-20">
        <div class="w-full p-4 bg-white rounded-lg">
            <div class="mb-4 font-bold tracking-wider text-gray-400">Ticket Information</div>
            <div class="grid grid-cols-2">
                <div class="grid gap-2">
                    <div>Nama Pemesan</div>
                    <div>Nomor Telepon Pemesan</div>
                    <div>Email Pemesan</div>
                    <div>Nomor Rekening Pembayaran</div>
                    <div>Status</div>
                </div>
                <div class="grid gap-2">
                    <div class="font-bold">{{$transaksi->user->name}}</div>
                    <div class="font-bold">{{$transaksi->user->no_telp}}</div>
                    <div class="font-bold">{{$transaksi->user->email}}</div>
                    <div>
                        {{$transaksi->metodePembayaran->nama_bank}} - {{$transaksi->metodePembayaran->no_rek}}
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="flex w-fit items-center p-2 px-4 justify-center rounded-md {{$transaksi->status == 'pending' ? 'bg-yellow-500' : 'bg-green-500'}}">
                            {{$transaksi->status == 'pending' ? 'Menunggu Pembayaran' : 'Pembayaran Berhasil' }}
                        </div>
                        @if($transaksi->status == 'pending')
                        <div>Upload Bukti Bayar</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full p-4 bg-white rounded-lg">
            <div class="mb-4 font-bold tracking-wider text-gray-400">Detail Ticket</div>
            <div class="grid gap-3">
                <div class="text-xs font-semibold text-gray-400">
                    Kode Order
                    <div class="text-lg text-black">{{$transaksi->id}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Nama Speedboat
                    <div class="text-lg text-black">{{$transaksi->jadwal->speedboat->nama_speedboat}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Relasi
                    <div class="text-lg text-black">{{$transaksi->jadwal->pel_asal}} -
                        {{$transaksi->jadwal->pel_tujuan}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Waktu Keberangkatan
                    <div class="text-lg text-black">
                        {{$carbon::parse($transaksi->jadwal->tgl_berangkat)->format('l, F j, Y')}} |
                        {{$transaksi->jadwal->jam_brgkt}}</div>
                    <div class="text-lg text-black">{{$transaksi->jadwal->tgl_brgkt}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Waktu Tiba
                    <div class="text-lg text-black">
                        {{$carbon::parse($transaksi->jadwal->tgl_berangkat)->format('l, F j, Y')}} |
                        {{$transaksi->jadwal->jam_tiba}}</div>
                    <div class="text-lg text-black">{{$transaksi->jadwal->tgl_brgkt}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Harga
                    <div class="text-lg text-black">IDR {{$transaksi->total}}K</div>
                </div>
            </div>
        </div>

        <!-- Data Penumpang -->
        <div class="grid grid-cols-{{count($dataPenumpang)}} gap-3">
            @foreach($dataPenumpang as $key=>$penumpang)
            <div class="grid w-full gap-2 p-4 bg-white rounded-lg">
                <div class="mb-4 font-bold tracking-wider text-gray-400">Data Penumpang {{$key + 1}}</div>
                <div class="text-xs font-semibold text-gray-400">
                    NIK
                    <div class="text-lg text-black">{{$penumpang->id}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Nama Penumpang
                    <div class="text-lg text-black">{{$penumpang->nama}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Jenis Kelamin
                    <div class="text-lg text-black">{{$penumpang->jenis_kelamin}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Alamat
                    <div class="text-lg text-black">{{$penumpang->alamat}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    No Telepon
                    <div class="text-lg text-black">{{$penumpang->no_telp}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    No Telepon Darurat
                    <div class="text-lg text-black">{{$penumpang->no_telp_darurat}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

</body>
@endsection
