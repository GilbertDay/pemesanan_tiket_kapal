@extends('layouts.master')

@section('title', 'Pemilihan Jadwal')

@section('content')

<body class="bg-[#151F57] py-5 px-10 ">
    <nav class="flex justify-between text-2xl">
        <a href="/" class="font-bold text-white">
            DisHub Hal-Bar
        </a>
    </nav>

    <div class="flex flex-col gap-3 mt-5">
        <div class="flex gap-3 rounded-lg ">
            <div class="flex w-3/5 bg-white flex-col rounded-lg p-5">
                <div class="font-bold text-orange-600 tracking-wider">Rincian Perjalanan</div>
                <div class="flex">
                    <div class="grow mt-3 tracking-wide">
                        <div class="text-sm font-semibold text-gray-600">Tipe Tiket</div>
                        <div class=" text-lg">{{$layanan == 'pesanan_pribadi' ? 'Tiket Reguler' : 'Carter Speedboat'}}
                        </div>
                    </div>

                    @if($layanan == 'pesanan_pribadi')
                    <div class="grow mt-3 tracking-wide">
                        <div class="text-sm font-semibold text-gray-600">Total Penumpang</div>
                        <div class=" text-lg">{{$jumlah_penumpang}} Penumpang
                        </div>
                    </div>
                    @endif
                </div>
                <div class="flex flex-col gap-1">
                    <div class="text-sm font-semibold text-gray-600 mt-5">Tiket Keberangkatan</div>
                    <div class="flex gap-4 items-center">
                        <div class="text-xl font-bold">Yogyakarta (YK)</div>
                        <img class="mt-1 mr-1" src="{{asset('/assets/right-arrow.jpg')}}" width="20">
                        <div class="text-xl font-bold">Bandara Int.Yogyakarta (YIA)</div>
                    </div>
                    <div class="text-gray-600 font-semibold text-sm">{{$tanggalBerangkat}} | 4:20 - 5:20</div>
                </div>
            </div>
            <div class="flex w-2/5 bg-white flex-col justify-between rounded-lg p-5">
                <div>
                    <div class="font-bold text-orange-600 tracking-wider ">Rincian Harga</div>
                    <div class="flex justify-between mt-5">
                        <div class="text-gray-600 font-semibold text-sm">Penumpang Keberangkatan</div>
                        <div class="font-semibold">3x IDR 50K</div>
                    </div>
                    <div class="flex justify-between mt-2">
                        <div class="text-gray-600 font-semibold text-sm">Biaya Penanganan</div>
                        <div class="font-semibold">5K</div>
                    </div>
                    <div class="flex justify-between mt-2">
                        <div class="text-gray-600 font-semibold text-sm">Diskon</div>
                        <div class="font-semibold">{{$layanan == 'pesanan_pribadi' ? '0' : '50K'}}</div>
                    </div>
                    <div class="flex justify-between mt-2">
                        <div class="text-gray-600 font-semibold text-sm">Total Harga</div>
                        <div class="font-semibold">IDR 150K</div>
                    </div>
                </div>
                <div class="w-full bg-green-600 cursor-pointer text-white text-center rounded-lg mt-5 py-2">
                    Lanjutkan
                    Pembayaran</div>
            </div>
        </div>
        @if($layanan == 'carter')

        <div class="flex w-3/5 bg-white flex-col rounded-lg p-5">
            <div class="font-bold text-orange-600 tracking-wider">Data Pemesan</div>
            <div class="flex gap-4 mt-5">
                <div class="w-3/6">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        Nama
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="username" type="text" placeholder="Username" value="{{ Auth::user()->name }}" readonly>
                    <div class=" border-[1px] border-gray-600"></div>
                </div>

                <div class="w-3/6">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        NIK
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="email" type="number" placeholder="Masukan Nomor Induk Kependudukan">
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
            </div>
            <div class="flex gap-4 mt-5">
                <div class="w-2/6">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        Email
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="email" type="mail" placeholder="email" value="{{ Auth::user()->email }}" readonly>
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
                <div class="w-2/6">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        No. Telp
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="noHp" type="number" value="{{ Auth::user()->no_telp }}">
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
                <div class="w-2/6">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        No. Telp Darurat
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="noHp" type="number" placeholder="Masukan No Hp Darurat">
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
            </div>

            <div class=" mt-5">
                <label class="block text-gray-600 text-sm font-semibold mb-1">
                    Alamat
                </label>
                <input
                    class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                    id="alamat" type="text" placeholder="Masukan Alamat Lengkap">
                <div class=" border-[1px] border-gray-600"></div>
            </div>

        </div>

        @else
        <div class="flex w-3/5 bg-white flex-col rounded-lg p-5 gap-7 ">
            @for ($i = 0; $i < $jumlah_penumpang; $i++) <div class="">
                <div class="font-bold text-lg text-gray-700">Penumpang {{$i + 1}}</div>
                <div class="mt-5">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        NIK
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="email" type="number" placeholder="Masukan Nomor Induk Kependudukan">
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
                <div class="mt-5">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        Nama
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="username" type="text" placeholder="Username">
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
                <div class="mt-5">
                    <label class="block text-gray-600 text-sm font-semibold mb-1">
                        Alamat
                    </label>
                    <input
                        class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                        id="alamat" type="text" placeholder="Masukan Alamat Lengkap">
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
                <div class="flex mt-5 gap-10">
                    <div class="w-3/6">
                        <label class="block text-gray-600 text-sm font-semibold mb-1">
                            No. Telp
                        </label>
                        <input
                            class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                            id="noHp" type="number" placeholder="Masukan No Hp">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                    <div class="w-3/6">
                        <label class="block text-gray-600 text-sm font-semibold mb-1">
                            No. Telp Darurat
                        </label>
                        <input
                            class=" appearance-none border rounded w-full py-2 text-gray-700 leading-tight outline-none border-none "
                            id="noHp" type="number" placeholder="Masukan No Hp Darurat">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                </div>
        </div>
        @endfor
        @endif


    </div>
    </div>

</body>
@endsection
