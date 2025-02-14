@extends('layouts.master')

@section('title', 'Daftar Kapal')

@section('content')

<body class="bg-[#151F57] p-3">
    <nav class="flex justify-between px-10 py-5">
        <a href="/" class="font-bold text-white">

            DisHub Hal-Bar
        </a>
        <div class="flex gap-10 px-16 py-2 font-bold bg-white rounded-2xl">
            <a href="/login">Masuk</a>
            <a class="text-[#F9A119]" href="/register">Daftar</a>
        </div>
    </nav>

    <div class="mt-10">
        <div class="text-4xl font-bold text-center text-white">Daftar Akun Baru</div>
        <div class="font-bold text-center text-white ">Sudah memiliki akun? <a class="text-[#F9A119]"
                href="/login">MASUK</a></div>
        <form class="flex flex-col items-center mt-8" action="/register" method="POST">
            @csrf
            <div class="">
                <input
                    class="w-[500px] px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-full-name" type="text" placeholder="Masukan Nama">
            </div>
            <div class="mt-3">
                <input
                    class="w-[500px] px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-full-name" type="email" placeholder="Masukan Email">
            </div>
            <div class="mt-3">
                <input
                    class="w-[500px] px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-full-name" type="number" placeholder="Masukan No Telp">
            </div>
            <div class="mt-3">
                <input
                    class="w-[500px] px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-password" type="password" placeholder="Masukan Kata Sandi">
            </div>
            <div class="mt-3">
                <input
                    class="w-[500px] px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-password" type="password" placeholder="Konfirmasi Kata Sandi">
            </div>

            <button
                class="px-10 mt-3 py-2 font-bold text-white bg-[#F9A119] rounded shadow hover:bg-[#d8993a] focus:shadow-outline focus:outline-none"
                type="submit">
                Daftar
            </button>

        </form>
    </div>

    <!-- <form action="/cek-login" method="POST">
        <div>

        </div>
    </form> -->
</body>

@endsection
