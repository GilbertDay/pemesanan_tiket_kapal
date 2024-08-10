@extends('layouts.master')

@section('title', 'Pemilihan Jadwal')

@section('content')

<body class="bg-[#151F57] py-5 px-10 ">
    <nav class="flex justify-between text-2xl">
        <a href="/" class="font-bold text-white no-underline">
            DisHub Hal-Bar
        </a>
    </nav>

    <form action="/saveOrders" method="POST">
        @csrf
        <!-- Data yang di passing ke controller pembayaran -->
        <input type="text " hidden name="jumlah_penumpang" value="{{$jumlah_penumpang}}">
        <input type="text " hidden name="layanan" value="{{$layanan}}">
        <input type="text " hidden name="id_user" value="{{Auth::user()->id}}">
        <input type="text " hidden name="id_jadwal" value="{{$jadwal->id}}">
        <input type="text " hidden name="biaya_penanganan" value="5">
        <input type="text " hidden name="harga_tiket" value="{{$jadwal->speedboat->harga}}">
        <input type="text " hidden name="diskon" value="{{$layanan == 'pesanan_pribadi' ? '0' : '50'}}">
        <input type="text " hidden name="total"
            value="{{($layanan == 'pesanan_pribadi' ? $jumlah_penumpang * $jadwal->speedboat->harga : $jadwal->speedboat->kapasitas_kursi * $jadwal->speedboat->harga - 50 ) + 5}}">
        <!-- Data yang di passing ke controller pembayaran -->


        <div class="flex flex-col gap-3 mt-5">
            <div class="flex gap-3 rounded-lg ">
                <div class="flex flex-col w-3/5 p-5 bg-white rounded-lg">
                    <div class="text-xl font-bold tracking-wider text-orange-600">Rincian Perjalanan</div>
                    <div class="flex">
                        <div class="mt-3 tracking-wide grow">
                            <div class="text-sm font-semibold text-gray-600">Tipe Tiket</div>
                            <div class="text-lg ">
                                {{$layanan == 'pesanan_pribadi' ? 'Tiket Reguler' : 'Carter Speedboat'}}
                            </div>
                        </div>

                        @if($layanan == 'pesanan_pribadi')
                        <div class="mt-3 tracking-wide grow">
                            <div class="text-sm font-semibold text-gray-600">Total Penumpang</div>
                            <div class="text-lg ">{{$jumlah_penumpang}} Penumpang
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="mt-4 text-sm font-semibold text-gray-600">Tiket Keberangkatan</div>
                        <div class="flex items-center gap-4">
                            <div class="text-xl font-bold">{{$jadwal->pel_asal}}</div>
                            <img class="mt-1 mr-1" src="{{asset('/assets/right-arrow.jpg')}}" width="20">
                            <div class="text-xl font-bold">{{$jadwal->pel_tujuan}}</div>
                        </div>
                        <div class="text-sm font-semibold text-gray-600">{{$tanggalBerangkat}} |
                            {{$jadwal->jam_brgkt}} - {{$jadwal->jam_tiba}} </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between w-2/5 p-5 bg-white rounded-lg">
                    <div>
                        <div class="text-xl font-bold tracking-wider text-orange-600">Rincian Harga</div>
                        <div class="flex justify-between mt-3">
                            <div class="text-sm font-semibold text-gray-600">Penumpang Keberangkatan</div>
                            <div class="font-semibold">
                                {{$layanan == 'pesanan_pribadi' ? $jumlah_penumpang : $jadwal->speedboat->kapasitas_kursi}}x
                                Rp.{{$jadwal->speedboat->harga}}.000</div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <div class="text-sm font-semibold text-gray-600">Biaya Penanganan</div>
                            <div class="font-semibold">Rp.5.000</div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <div class="text-sm font-semibold text-gray-600">Diskon</div>
                            <div class="font-semibold">{{$layanan == 'pesanan_pribadi' ? '0' : 'Rp.50.000'}}</div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <div class="text-sm font-semibold text-gray-600">Total Harga</div>
                            <div class="font-semibold">Rp.
                            {{ number_format(($layanan == 'pesanan_pribadi' ? $jumlah_penumpang * $jadwal->speedboat->harga : $jadwal->speedboat->kapasitas_kursi * $jadwal->speedboat->harga - 50) + 5, 0, ',', '.') }}.000
                            </div>
                        </div>
                        <div>
                            <select id="metodePembayaran" name="metodePembayaran"
                                class="w-full px-3 py-2 mt-3 border-2 border-black rounded-xl" required>
                                <option class="hidden" value="">Pilih Metode Pembayaran</option>
                                @foreach($metodePembayaran as $mp)
                                <option value="{{$mp->id}}">{{$mp->nama_bank}} - {{$mp->no_rek}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full py-2 mt-5 text-center text-white bg-green-600 rounded-lg cursor-pointer">
                        Lanjutkan
                        Pembayaran</button>
                </div>
            </div>
            @if($layanan == 'carter')
            <div class="flex flex-col w-3/5 p-5 bg-white rounded-lg">
                <div class="font-bold tracking-wider text-orange-600">Data Pemesan</div>
                <div class="flex gap-4 mt-5">
                    <div class="w-3/6">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            Nama
                        </label>
                        <input required name="nama_penumpang[]"
                            class="w-full py-2 leading-tight text-gray-700 border border-none rounded outline-none appearance-none "
                            id="username" type="text" placeholder="Username" value="{{ Auth::user()->name }}" readonly>
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>

                    <div class="w-3/6">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            NIK
                        </label>
                        <input required name="nik_penumpang[]"
                            class="w-full py-2 leading-tight text-gray-700 border border-none rounded outline-none appearance-none "
                            type="number" placeholder="Masukan Nomor Induk Kependudukan">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                </div>
                <div class="flex gap-4 mt-5">
                    <div class="w-2/6">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            Nama Instansi
                        </label>
                        <input name="nama_instansi"
                            class="w-full py-2 leading-tight text-gray-700 border border-none rounded outline-none appearance-none "
                            type="text" placeholder="Nama Instansi">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                    <div class="w-2/6">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            No. Telp
                        </label>
                        <input required name="no_telp[]"
                            class="w-full py-2 leading-tight text-gray-700 border border-none rounded outline-none appearance-none "
                            type="number" value="{{ Auth::user()->no_telp }}">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                    <div class="w-2/6">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            No. Telp Darurat
                        </label>
                        <input required name="no_telp_darurat[]"
                            class="w-full py-2 leading-tight text-gray-700 border border-none rounded outline-none appearance-none "
                            type="number" placeholder="Masukan No Hp Darurat">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                </div>

                <div class="mt-5 ">
                    <label class="block mb-1 text-sm font-semibold text-gray-600">
                        Alamat
                    </label>
                    <input required name="alamat[]"
                        class="w-full py-2 leading-tight text-gray-700 border border-none rounded outline-none appearance-none "
                        type="text" placeholder="Masukan Alamat Lengkap">
                    <div class=" border-[1px] border-gray-600"></div>
                </div>
            </div>

            @else
            <div class="flex flex-col w-3/5 p-5 bg-white rounded-lg gap-7 ">
                @for ($i = 1; $i <= $jumlah_penumpang; $i++) <div class="">
                    <div class="text-lg font-bold text-gray-700">Penumpang {{$i}}</div>
                    <div class="mt-3">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            NIK
                        </label>
                        <input required name="nik_penumpang[]"
                            class="w-full py-2 leading-tight text-gray-700 border-none rounded outline-none appearance-none "
                            id="nik" type="number" placeholder="Masukan Nomor Induk Kependudukan" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type = "number"
            maxlength = "16">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                    <div class="mt-3">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            Nama
                        </label>
                        <input required name="nama_penumpang[]"
                            class="w-full py-2 leading-tight text-gray-700 border-none rounded outline-none appearance-none "
                            id="username" type="text" placeholder="Username">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                    <div class="mt-3">
                        <label class="block mb-1 text-sm font-semibold text-gray-600">
                            Alamat
                        </label>
                        <input required name="alamat[]"
                            class="w-full py-2 leading-tight text-gray-700 border-none rounded outline-none appearance-none "
                            id="alamat" type="text" placeholder="Masukan Alamat Lengkap">
                        <div class=" border-[1px] border-gray-600"></div>
                    </div>
                    <div class="flex gap-10 mt-3">
                        <div class="w-3/6">
                            <label class="block mb-1 text-sm font-semibold text-gray-600">
                                No. Telp
                            </label>
                            <input required name="no_telp[]"
                                class="w-full py-2 leading-tight text-gray-700 border-none rounded outline-none appearance-none "
                                id="noHp" type="number" placeholder="Masukan No Hp">
                            <div class=" border-[1px] border-gray-600"></div>
                        </div>
                        <div class="w-3/6">
                            <label class="block mb-1 text-sm font-semibold text-gray-600">
                                No. Telp Darurat
                            </label>
                            <input required name="no_telp_darurat[]"
                                class="w-full py-2 leading-tight text-gray-700 border-none rounded outline-none appearance-none "
                                id="noHp" type="number" placeholder="Masukan No Hp Darurat">
                            <div class=" border-[1px] border-gray-600"></div>
                        </div>
                    </div>
            </div>
            @endfor
            @endif
        </div>
    </form>


</body>
@endsection
