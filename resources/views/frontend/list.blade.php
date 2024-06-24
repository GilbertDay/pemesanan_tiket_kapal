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
        <form id="form-list" method="POST">
            @csrf
            <input name="dataInput[jumlah_penumpang]" type="text" value={{$penumpang}} hidden>
            <input name="dataInput[tanggal]" type="text" value={{$tanggal}} hidden>
            <input name="dataInput[layanan]" type="text" value={{$layanan}} hidden>
            <div class="flex items-center justify-center h-16"> Terdapat <span class="px-1 font-bold">
                    {{$listjadwal->count()}}
                </span> Jadwal yang masih tersedia pada tanggal <span class="px-1 font-bold"> {{$tanggal}} </span>  
            </div>
            <div class="flex flex-col py-10">
                <div class="flex w-full ml-12 text-center">
                    <div class="w-1/5 ml-6 font-semibold">Jam Berangkat</div>
                    <div class="w-1/5 -ml-4 font-semibold">Jam Tiba</div>
                    <div class="w-1/5 -ml-2 font-semibold">Jumlah Kursi</div>
                    <div class="w-1/5 -ml-3 font-semibold">Harga (IDR)</div>
                </div>

                <!-- Jika Kosong -->

                <!-- <div class="mt-5 text-gray-500">
                    <div class="w-1/5 mb-3 font-bold">PALAMEA EXPRESS</div>
                    <div class="pl-10">
                        <div class="flex font-semibold text-center">
                            <div id="check" class="p-1 bg-gray-400 rounded-sm w-[29px] h-[32px]"></div>
                            <div class="w-1/5 ">06.30</div>
                            <div class="w-1/5">07.15</div>
                            <div class="w-1/5">0</div>
                            <div class="w-1/5">Rp.50.000</div>
                            <div class="px-10 py-1 text-white bg-gray-500 rounded-lg cursor-pointer">Sold
                            </div>

                        </div>
                    </div>
                </div> -->

                <!-- End Jika Kosong -->


                @foreach($listjadwal as $key=>$jadwal)
                <div class="mt-5">
                    <div class="w-1/5 font-bold text-[#151F57] mb-3">{{$jadwal->speedboat->nama_speedboat}}</div>
                    <div class="pl-10">
                        <div class="flex items-center font-semibold text-center">
                            <div>
                                <div id="check-true-{{$jadwal->id}}"
                                    class="hidden p-1 bg-green-500 rounded-sm w-fit h-fit">✔
                                </div>
                                <div id="check-false-{{$jadwal->id}}"
                                    class="p-1 bg-gray-400 rounded-sm w-[29px] h-[32px]">
                                </div>
                            </div>
                            <div id="jb-{{$jadwal->id}}" class="w-1/5 ">{{$jadwal->jam_brgkt}}</div>
                            <div id="jt-{{$jadwal->id}}" class="w-1/5">{{$jadwal->jam_tiba}}</div>
                            <div class="w-1/5">30</div>
                            <div id="tarif-{{$jadwal->id}}" class="w-1/5">Rp.
                                {{$jadwal->speedboat->harga}}.000</div>
                            <div id="btn-pilih-{{$jadwal->id}}" onclick="handlePilihKapal(`{{$jadwal->id}}`)"
                                class="bg-[#151F57] cursor-pointer text-white py-1 px-10 rounded-lg">Pilih
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>

            <div>
                <div id="btn-lanjut-no-link"
                    class="flex justify-center w-full px-5 py-2 font-bold tracking-wide text-center text-white bg-gray-400 rounded-xl">
                    Lanjut
                </div>
                <button id="btn-lanjut-link" type="submit"
                    class="flex justify-center hidden w-full px-5 py-2 font-bold tracking-wide text-center text-white bg-green-700 rounded-xl">
                    Lanjut
                </button>
            </div>
        </form>
    </div>

</body>
@endsection
