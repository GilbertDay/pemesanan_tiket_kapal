@extends('layouts.master')

@section('title', 'Daftar Kapal')

@section('content')

<body class="bg-[#151F57] py-5 px-10">

    <nav class="flex justify-between text-2xl">
        <a href="/" class="font-bold text-white">
            DisHub Hal-Bar
        </a>
    </nav>

    <div class="px-20 mt-16 bg-white rounded-xl">
        <div class="flex flex-col py-10">
            <!-- <table class="w-full">
                <thead>
                    <tr class="flex justify-between">
                        <th class="w-1/5">Nama Speeboat</th>
                        <th class="w-1/5">Jam Berangkat</th>
                        <th class="w-1/5">Jam Tiba</th>
                        <th class="w-1/5">Kursi Tersedia</th>
                        <th class="w-1/5">Harga (IDR)</th>
                        <th class="w-1/5">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="flex items-center text-center">
                        <td class="w-1/5">PALAMAE EXPRESS</td>
                        <td class="w-1/5">06.30</td>
                        <td class="w-1/5">07.15</td>
                        <td class="w-1/5">30</td>
                        <td class="w-1/5">Rp.50.000</td>
                        <td><button class="px-4 py-2 text-white bg-blue-500 rounded">Pilih</button></td>
                    </tr>
                    <tr class="flex items-center justify-between">
                        <td class="w-1/5">SAKINA PUTRI</td>
                        <td class="w-1/5">08.00</td>
                        <td class="w-1/5">09.00</td>
                        <td class="w-1/5">30</td>
                        <td class="w-1/5">Rp.75.000</td>
                        <td><button class="px-4 py-2 text-white bg-blue-500 rounded">Pilih</button></td>
                    </tr>
                    <tr class="flex items-center justify-between gap-8">
                        <td class="w-1/5">SB ARSHIYA UDIN <span class="text-yellow-500">★</span></td>
                        <td class="w-1/5">10.00</td>
                        <td class="w-1/5">11.00</td>
                        <td class="w-1/5">50</td>
                        <td class="w-1/5">Rp.100.000</td>
                        <td><button class="px-4 py-2 text-white bg-blue-500 rounded">Pilih</button></td>
                    </tr>
                    <tr class="flex items-center justify-between gap-8">
                        <td class="w-1/5">BINTANG FAJAR</td>
                        <td class="w-1/5">12.00</td>
                        <td class="w-1/5">13.00</td>
                        <td class="w-1/5">30</td>
                        <td class="w-1/5">Rp.75.000</td>
                        <td><button class="px-4 py-2 text-white bg-blue-500 rounded">Pilih</button></td>
                    </tr>
                    <tr class="flex items-center justify-between gap-8">
                        <td class="w-1/5">NGOMI BASIGARO</td>
                        <td class="w-1/5">15.00</td>
                        <td class="w-1/5">16.00</td>
                        <td class="w-1/5">30</td>
                        <td class="w-1/5">Rp.75.000</td>
                        <td><button class="px-4 py-2 text-white bg-blue-500 rounded">Pilih</button></td>
                    </tr>
                </tbody>
            </table> -->
            <div class="flex w-full pl-10 text-center">
                <div class="w-1/5">Jam Berangkat</div>
                <div class="w-1/5">Jam Tiba</div>
                <div class="w-1/5">Jumlah Kursi</div>
                <div class="w-1/5">Harga (IDR)</div>
            </div>

            <div class="mt-5">
                <div class="w-1/5 font-bold">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex text-center">
                        <div class="w-1/5 ">06.30</div>
                        <div class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div class="w-1/5">Rp.50.000</div>
                        <div><button>Pilih</button></div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="w-1/5 font-bold">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex text-center">
                        <div class="w-1/5 ">06.30</div>
                        <div class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div class="w-1/5">Rp.50.000</div>
                        <div><button>Pilih</button></div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="w-1/5 font-bold">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex text-center">
                        <div class="w-1/5 ">06.30</div>
                        <div class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div class="w-1/5">Rp.50.000</div>
                        <div><button>Pilih</button></div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="w-1/5 font-bold">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex text-center">
                        <div class="w-1/5 ">06.30</div>
                        <div class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div class="w-1/5">Rp.50.000</div>
                        <div><button>Pilih</button></div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="w-1/5 font-bold">PALAMEA EXPRESS</div>
                <div class="pl-10">
                    <div class="flex text-center">
                        <div class="w-1/5 ">06.30</div>
                        <div class="w-1/5">07.15</div>
                        <div class="w-1/5">30</div>
                        <div class="w-1/5">Rp.50.000</div>
                        <div><button>Pilih</button></div>
                    </div>
                </div>
            </div>



        </div>

    </div>


</body>
@endsection
