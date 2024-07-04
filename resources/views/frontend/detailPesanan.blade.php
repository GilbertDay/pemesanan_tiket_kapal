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
                    <div class="flex gap-3">
                        <div class="flex items-center w-10">
                            <img src="{{asset($transaksi->metodePembayaran->img)}}" alt="">
                        </div>
                        <div class="flex flex-col">
                            <div>{{$transaksi->metodePembayaran->nama_rekening}}</div>
                            <div class="font-semibold">{{$transaksi->metodePembayaran->no_rek}}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="flex w-fit items-center p-2 px-4 justify-center rounded-md {{$transaksi->status == 'pending' ? 'bg-yellow-500' : 'bg-green-500'}}">
                            {{$transaksi->status == 'pending' ? 'Menunggu Pembayaran' : 'Pembayaran Berhasil' }}
                        </div>
                        @if($transaksi->status == 'pending')
                        <button type="button" data-bs-toggle="modal" data-bs-target="#uploadBuktiBayar">
                            Upload Bukti Bayar
                        </button>
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
                @if($penumpang->nama_instansi != '')
                <div class="text-xs font-semibold text-gray-400">
                    Nama Pemesan
                    <div class="text-lg text-black">{{$penumpang->nama}}</div>
                </div>
                <div class="text-xs font-semibold text-gray-400">
                    Nama Instasi
                    <div class="text-lg text-black">{{$penumpang->nama_instansi}}</div>
                </div>
                @else
                <div class="text-xs font-semibold text-gray-400">
                    Nama Penumpang
                    <div class="text-lg text-black">{{$penumpang->nama}}</div>
                </div>
                @endif
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

    <!-- Form Tambah Jadwal  -->
    <div class="modal fade" id="uploadBuktiBayar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="uploadBuktiBayarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiBayarLabel">Bukti Bayar</h5>

                </div>
                <div class="modal-body">
                    <form action="/uploadBuktiBayar" method="POST" class="text-black" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="transaksi_id" value="{{$transaksi->id}}" hidden>
                        <div>
                            <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                Upload Bukti Bayar
                            </label>
                            <input
                                class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                name="bukti_bayar" type="file" required />
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="px-2 py-2 text-white bg-gray-600 rounded-lg"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="px-2 py-2 text-white bg-purple-500 rounded-lg">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
