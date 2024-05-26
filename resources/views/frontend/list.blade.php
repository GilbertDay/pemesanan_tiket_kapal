@extends('layouts.master')

@section('title', 'Daftar Kapal')

@section('content')

<body class="bg-[#151F57] py-5 px-10">
    <nav class="flex justify-between text-2xl">
        <a href="/" class="font-bold text-white">
            DisHub Hal-Bar
        </a>
    </nav>

    <div class="px-20 pb-5 mt-16 bg-white rounded-xl">
        <div class="flex flex-col py-10">
            <div class="flex w-full pl-10 text-center">
                <div class="w-1/5 font-semibold">Jam Berangkat</div>
                <div class="w-1/5 font-semibold">Jam Tiba</div>
                <div class="w-1/5 font-semibold">Jumlah Kursi</div>
                <div class="w-1/5 font-semibold">Harga (IDR)</div>
            </div>

            <!-- Jika Kosong -->

            <div class="mt-5 text-gray-500">
                <div class="w-1/5 mb-3 font-bold">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex font-semibold text-center">
                        <div id="check" class="p-1 bg-gray-400 rounded-sm w-[29px] h-[32px]"></div>
                        <div class="w-1/5 ">06.30</div>
                        <div class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div class="w-1/5">Rp.50.000</div>
                        <div class="px-10 py-1 text-white bg-gray-500 rounded-lg cursor-pointer">Sold
                        </div>

                    </div>
                </div>
            </div>

            <!-- End Jika Kosong -->

            <div class="mt-5">
                <div class="w-1/5 font-bold text-[#151F57] mb-3">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex items-center font-semibold text-center">
                        <div>
                            <div id="check-true-1" class="hidden p-1 bg-green-500 rounded-sm w-fit h-fit">✔</div>
                            <div id="check-false-1" class="p-1 bg-gray-400 rounded-sm w-[29px] h-[32px]"></div>
                        </div>
                        <div id="jb-1" class="w-1/5 ">06.30</div>
                        <div id="jt-1" class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div id="tarif-1" class="w-1/5">Rp.50.000</div>
                        <div id="btn-pilih-1" onclick="handlePilihKapal(1)"
                            class="bg-[#151F57] cursor-pointer text-white py-1 px-10 rounded-lg">Pilih
                        </div>

                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="w-1/5 font-bold text-[#151F57] mb-3">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex font-semibold text-center">
                        <div>
                            <div id="check-true-2" class="hidden p-1 bg-green-500 rounded-sm w-fit h-fit">✔</div>
                            <div id="check-false-2" class="p-1 bg-gray-400 rounded-sm w-[29px] h-[32px]"></div>
                        </div>
                        <div id="jb-2" class="w-1/5 ">06.30</div>
                        <div id="jt-2" class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div id="tarif-2" class="w-1/5">Rp.50.000</div>
                        <div id="btn-pilih-2" onclick="handlePilihKapal(2)"
                            class="bg-[#151F57] cursor-pointer text-white py-1 px-10 rounded-lg">Pilih
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="w-1/5 font-bold text-[#151F57] mb-3">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex font-semibold text-center">
                        <div>
                            <div id="check-true-3" class="hidden p-1 bg-green-500 rounded-sm w-fit h-fit">✔</div>
                            <div id="check-false-3" class="p-1 bg-gray-400 rounded-sm w-[29px] h-[32px]"></div>
                        </div>
                        <div id="jb-3" class="w-1/5 ">06.30</div>
                        <div id="jt-3" class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div id="tarif-3" class="w-1/5">Rp.50.000</div>
                        <div id="btn-pilih-3" onclick="handlePilihKapal(3)"
                            class="bg-[#151F57] cursor-pointer text-white py-1 px-10 rounded-lg">Pilih
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <a id="btn-lanjut-no-link"
                class="flex justify-center w-full px-5 py-2 font-bold tracking-wide text-center text-white bg-gray-400 rounded-xl">
                Lanjut
            </a>
            <a id="btn-lanjut-link" href="/"
                class="flex justify-center hidden w-full px-5 py-2 font-bold tracking-wide text-center text-white bg-green-700 rounded-xl">
                Lanjut
            </a>
        </div>


    </div>


</body>
@endsection
