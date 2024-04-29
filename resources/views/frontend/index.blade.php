@extends('layouts.master')

@section('title', )

@section('content')
<nav class="flex justify-between px-20 bg-gradient-to-b mt-10 text-xl from-white to-transparent h-[350px]  ">
    <a href="/" class="font-bold">
        DisHub Hal-Bar
    </a>
    <div class="flex gap-20 font-light tracking-wide">
        <a href="/">Beranda</a>
        <a href="/">Jadwal</a>
        <a href="/">Tentang</a>
    </div>
    <div class="flex gap-5 font-bold ">
        <a href="/">Masuk</a>
        <a href="/">Daftar Akun</a>
    </div>
</nav>
<div class="bg-gray-900 bg-opacity-50 text-center mx-28 rounded-2xl flex flex-col gap-10 px-10 pt-10 pb-16">
    <div class="flex gap-20">
        <div class=" w-1/2">
            <div class="font-bold text-white tracking-wide text-left text-xl mb-2">Pelabuhan Asal</div>
            <form class="">
                <select id="pelabuhan-asal" class="rounded-xl px-3 py-2 w-full">
                    <option selected>Pilih Pelabuhan Asal</option>
                    <option value="US">Pelabuhan Laut Jailolo</option>
                    <option value="CA">Pelabuhan Bastion Ternate</option>
                </select>
            </form>
        </div>
        <div class=" w-1/2">
            <div class="font-bold text-white tracking-wide text-left text-xl mb-2">Pelabuhan Tujuan</div>
            <form class="">
                <select id="pelabuhan-tujuan" class="rounded-xl px-3 py-2 w-full">
                    <option selected>Pilih Pelabuhan Tujuan</option>
                    <option value="US">Pelabuhan Laut Jailolo</option>
                    <option value="CA">Pelabuhan Bastion Ternate</option>
                </select>
            </form>
        </div>
    </div>
    <div class="flex gap-20">
        <div class=" w-1/2">
            <div class="font-bold text-white tracking-wide text-left text-xl mb-2">Tanggal Keberangkatan</div>
            <input class="rounded-xl px-3 py-2 w-full " type="date" placeholder="Pilih Tanggal Keberangkatan" />
        </div>
        <div class=" w-1/2">
            <div class="font-bold text-white tracking-wide text-left text-xl mb-2">Jenis Layanan</div>
            <form class="">
                <select id="layanan" class="rounded-xl px-3 py-2 w-full">
                    <option selected>Pilih Jenis Layanan Speedboat</option>
                    <option value="US">Pemesanan Pribadi</option>
                    <option value="CA">Carter Speedboat</option>
                </select>
            </form>

            <!-- <input class="rounded-xl  px-3 py-2 w-full " type="text" placeholder="Pilih Jenis Layanan Speedboat" /> -->
        </div>
    </div>
    <div class="bg-blue-900 text-white font-bold py-3 rounded-xl text-xl tracking-wide">Temukan Tiket</div>
</div>
@endsection
