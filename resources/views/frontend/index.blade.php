@extends('layouts.master')

@section('title', 'Pemilihan Jadwal')

@section('content')

<body>
    <img class="absolute w-full h-full -z-10 " src="{{ asset('assets/Pelabuhan.jpg')}}" />

    <nav class="flex justify-between px-20 bg-gradient-to-b mt-10 text-xl from-white to-transparent h-[350px]  ">
        <a href="/" class="font-bold text-black no-underline">
            DisHub Hal-Bar
        </a>



        @if(Auth::check())
        <div class="flex gap-5 font-bold ">
            <!-- <span>{{ Auth::user()->name }}</span> -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    <li class="flex px-4 text-nowrap"><a href="/riwayatPesanan" class="text-black no-underline">Riwayat
                            Pemesanan</a></li>
                    <hr>
                    <li>
                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
        @else
        <div class="flex gap-5 font-bold ">
            <a class="text-black no-underline" href="/login">Login</a>
        </div>
        @endif
    </nav>
    <form action="/tampil-list" method="POST" class="-mt-32">
        @csrf
        <div class="flex flex-col gap-10 px-10 pt-10 pb-16 text-center bg-gray-900 bg-opacity-50 mx-28 rounded-2xl">
            <div class="flex gap-20">
                <div class="w-1/2">
                    <div class="mb-2 text-xl font-bold tracking-wide text-left text-white">Pelabuhan Asal</div>
                    <form class="">
                        <select id="pelabuhan-asal" name="asal" class="w-full px-3 py-2 rounded-xl"
                            onchange="setTujuan()">
                            <option class="hidden">Pilih Pelabuhan Asal</option>
                            <option value="Pelabuhan Laut Jailolo">Pelabuhan Laut Jailolo</option>
                            <option value="Pelabuhan Bastion Ternate">Pelabuhan Bastion Ternate</option>
                        </select>
                    </form>
                </div>
                <div class="w-1/2 ">
                    <div class="mb-2 text-xl font-bold tracking-wide text-left text-white">Pelabuhan Tujuan</div>
                    <input type="text" id="pelabuhan-tujuan" name="tujuan" value="" placeholder="Pelabuhan Tujuan"
                        required readonly class="w-full px-3 py-2 rounded-xl">

                </div>
            </div>
            <div class="flex gap-20">
                <div class="w-1/2 ">
                    <div class="mb-2 text-xl font-bold tracking-wide text-left text-white">Tanggal Keberangkatan</div>
                    <input class="w-full px-3 py-2 rounded-xl " name="inputData[tanggal]" type="text" id="datepicker"
                        placeholder="Pilih Tanggal Keberangkatan" />
                </div>
                <div class="w-1/2 ">
                    <div class="mb-2 text-xl font-bold tracking-wide text-left text-white">Jenis Layanan</div>
                    <select id="layanan" name="inputData[layanan]" class="w-full px-3 py-2 rounded-xl"
                        onchange="togglePenumpangInput()">
                        <option class="hidden">Pilih Jenis Layanan Speedboat</option>
                        <option value="pesanan_pribadi">Pemesanan Pribadi</option>
                        <option value="carter">Carter Speedboat</option>
                    </select>
                    <div id="jumlahPenumpang" class="flex justify-end hidden mt-2">
                        <div class="flex items-center gap-2 p-2 bg-green-600 rounded-lg w-fit">
                            <span class="text-white">Penumpang</span>
                            <button type="button"
                                class="flex items-center justify-center w-8 h-8 text-green-600 bg-white rounded-full"
                                onclick="changePenumpang(-1)">-</button>
                            <span id="penumpangCount" class="text-white">1</span>
                            <button type="button"
                                class="flex items-center justify-center w-8 h-8 text-green-600 bg-white rounded-full"
                                onclick="changePenumpang(1)">+</button>
                        </div>
                        <input type="hidden" id="penumpang" name="inputData[jumlah_penumpang]" value="1">
                    </div>
                </div>
            </div>
            <button type="submit" class="py-3 text-xl font-bold tracking-wide text-white bg-blue-900 rounded-xl">Temukan
                Tiket</button>
        </div>
    </form>
</body>
@endsection
