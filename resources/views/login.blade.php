@extends('layouts.master')

@section('title', 'Daftar Kapal')

@section('content')

<body class="bg-[#151F57] p-3">
    <nav class="flex justify-between px-10 py-5">
        <a href="/" class="font-bold text-white no-underline">

            DisHub Hal-Bar
        </a>
        <div class="flex gap-10 px-16 py-2 font-bold bg-white rounded-2xl">
            <a class="text-[#F9A119] no-underline" href="/login">Masuk</a>
            <a href="/register" class="text-black no-underline">Daftar</a>
        </div>
    </nav>

    <div class="mt-10">
        <div class="text-2xl font-bold text-center text-white">Masuk</div>

        @if(session('success'))
        <div class="px-3 py-2 mx-56 my-4 text-center text-white bg-green-600">
            <span class="cursor-pointer hover:bg-black"
                onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('success') }}
        </div>
        @endif

        <form class="flex flex-col items-center mt-8" action="/cek-login" method="POST">
            @csrf
            <div class="mb-6 text-start">
                <div class="">
                    <label class="block pr-4 mb-1 font-bold text-white text-start" for="inline-full-name">
                        Email
                    </label>
                </div>
                <div class="">
                    <input name="email"
                        class="w-[500px] px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="mail" placeholder="Masukan Email">
                </div>
            </div>
            <div class="mb-6 ">
                <div class="">
                    <label class="block pr-4 mb-1 font-bold text-white text-start" for="inline-password">
                        Password
                    </label>
                </div>
                <div class="">
                    <input name="password"
                        class="w-[500px] px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-password" type="password" placeholder="******************">
                </div>
            </div>

            <button
                class="px-4 py-2 font-bold text-white bg-[#F9A119] rounded shadow hover:bg-[#d8993a] focus:shadow-outline focus:outline-none"
                type="submit">
                Login
            </button>

        </form>
    </div>

    <!-- <form action="/cek-login" method="POST">
        <div>

        </div>
    </form> -->
</body>

@endsection
