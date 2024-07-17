<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.meta')
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        @inject('carbon', 'Carbon\Carbon')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('layouts.admin.header')
                @inject('carbon', 'Carbon\Carbon')

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="mb-6 text-lg text-gray-800 ">Data Jadwal</h1>

                    <!-- DataTales Example -->
                    <div class="mb-4 shadow card">
                        <div class="py-3 card-header">
                            <button type="button" data-toggle="modal" data-target="#tambahJadwal"
                                class="rounded-full border-2 px-3 py-2 border-slate-500 bg-[#151F57] hover:text-white hover:no-underline text-stone-100 text-center">Tambah
                                Jadwal</button>
                        </div>
                        <div class="card-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Speedboat</th>
                                            <th>Pelabuhan Asal</th>
                                            <th>Pelabuhan Tujuan</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Jam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwal as $j)
                                        <tr>
                                            <td>{{$j->speedboat->nama_speedboat}}</td>
                                            <td>{{$j->pel_asal}}</td>
                                            <td>{{$j->pel_tujuan}}</td>
                                            <td>{{$carbon::parse($j->tgl_berangkat)->format('d-m-Y')}}</td>
                                            <td>{{$j->jam_brgkt}} - {{$j->jam_tiba}} </td>
                                            <td>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#updateJadwal{{$j->id}}"
                                                    class="p-2 text-black bg-blue-400 rounded-lg">Edit</button>
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" data-toggle="modal"
                                                    data-target="#deleteJadwal{{ $j->id }}"
                                                    class="p-2 text-black bg-red-500 rounded-lg">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="flex justify-end px-3">
                            {{ $jadwal->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="my-auto text-center copyright">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Form Tambah Jadwal  -->
    <div class="modal fade" id="tambahJadwal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="tambahJadwalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahJadwalLabel">Tambah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/tambahJadwal" method="POST" class="text-black">
                        @csrf
                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Nama Speedboat
                        </label>
                        <select id="speedboat" name="speedboat" required
                            class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500">
                            <option value="" class="hidden">Pilih Speeboat</option>
                            @foreach($speedboat as $spd)
                            <option value="{{$spd->id}}">{{$spd->nama_speedboat}}</option>
                            @endforeach
                        </select>

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Tanggal Keberangkatan
                        </label>
                        <input
                            class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                            name="tgl_berangkat" type="text" id="date" required
                            placeholder="Pilih Tanggal Keberangkatan" />

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Pelabuhan Asal
                                </label>
                                <select id="pelabuhan-asal" name="pel_asal" required onchange="setTujuan()"
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500">
                                    <option class="hidden">Pilih Pelabuhan Asal</option>
                                    <option value="Pelabuhan Laut Jailolo">Pelabuhan Laut Jailolo</option>
                                    <option value="Pelabuhan Bastion Ternate">Pelabuhan Bastion Ternate</option>
                                </select>
                            </div>
                            <div class="w-1/2">

                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Pelabuhan Tujuan
                                </label>
                                <input type="text" id="pelabuhan-tujuan" name="pel_tujuan" value="" required readonly
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500">
                            </div>

                        </div>

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Jam Berangkat
                                </label>
                                <input name="jam_brgkt" required
                                    class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="time" />
                            </div>
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Jam Tiba
                                </label>
                                <input name="jam_tiba" required
                                    class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="time" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="px-2 py-2 text-white bg-gray-600 rounded-lg"
                                data-dismiss="modal">Batal</button>
                            <button type="submit" class="px-2 py-2 text-white bg-purple-500 rounded-lg">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Tambah Jadwal -->

    @foreach($jadwal as $jdwl)
    <div class="modal fade" id="updateJadwal{{$jdwl->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="updateJadwalLabel{{$jdwl->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateJadwalLabel">Update Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/updateJadwal" method="POST" class="text-black">
                        @csrf
                        <input type="text" name="id_jadwal" value="{{$jdwl->id}}" hidden>
                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Nama Speedboat
                        </label>
                        <select id="speedboat" name="speedboat" required
                            class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500">
                            <option value="" class="hidden">Pilih Speeboat</option>
                            @foreach($speedboat as $spd)
                            <option value="{{$spd->id}}" @if($jdwl->speedboat_id == $spd->id) selected @endif>
                                {{$spd->nama_speedboat}}
                            </option>
                            @endforeach
                        </select>

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Tanggal Keberangkatan
                        </label>
                        <input
                            class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                            name="tgl_berangkat" type="text" id="date{{$jdwl->id}}"
                            value="{{$carbon::parse($jdwl->tgl_berangkat)->format('d-m-Y')}}" required
                            placeholder="Pilih Tanggal Keberangkatan" />

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Pelabuhan Asal
                                </label>
                                <select id="pelabuhan-asal" name="pel_asal" required
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500">
                                    <option class="hidden">Pilih Pelabuhan Asal</option>

                                    <option value="Pelabuhan Laut Jailolo">Pelabuhan Laut Jailolo</option>
                                    <option value="Pelabuhan Bastion Ternate">Pelabuhan Bastion Ternate</option>
                                </select>
                            </div>
                            <div class="w-1/2">

                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Pelabuhan Tujuan
                                </label>
                                <select id="pelabuhan-tujuan" name="pel_tujuan" required
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500">
                                    <option class="hidden">Pilih Pelabuhan Tujuan</option>

                                    <option value="Pelabuhan Laut Jailolo">Pelabuhan Laut Jailolo</option>
                                    <option value="Pelabuhan Bastion Ternate">Pelabuhan Bastion Ternate</option>
                                </select>
                            </div>

                        </div>

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="jam-brgkt-{{$jdwl->id}}">
                                    Jam Berangkat
                                </label>
                                <input name="jam_brgkt" required
                                    class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="jam-brgkt-{{$jdwl->id}}" type="time" value="{{ $jdwl->jam_brgkt }}" />
                            </div>
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="jam-tiba-{{$jdwl->id}}">
                                    Jam Tiba
                                </label>
                                <input name="jam_tiba" required
                                    class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="jam-tiba-{{$jdwl->id}}" type="time" value="{{ $jdwl->jam_tiba }}" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="px-2 py-2 text-white bg-gray-600 rounded-lg"
                                data-dismiss="modal">Batal</button>
                            <button type="submit" class="px-2 py-2 text-white bg-purple-500 rounded-lg">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Delete Speedboat  -->
    <div class="modal fade" id="deleteJadwal{{$jdwl->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="deleteJadwalLabel{{$jdwl->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteJadwalLabel{{$jdwl->id }}">Delete Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-2 py-2 text-white bg-gray-600 rounded-lg"
                        data-dismiss="modal">Cancel</button>
                    <form action="/admin/deleteJadwal" method="POST">
                        @csrf
                        <input type="text" name="id_jadwal" value=" {{$jdwl->id}}" hidden>
                        <button type="submit" class="px-2 py-2 text-white bg-red-500 rounded-lg">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <script>
        function setTujuanUpdate(data) {
            data.forEach(element => {

                var asal = document.getElementById('pelabuhan-asal' + element.id).value;
                var tujuan = document.getElementById('pelabuhan-tujuan' + element.id);

                if (asal.value === 'Pelabuhan Laut Jailolo') {
                    tujuan.value = 'Pelabuhan Bastion Ternate';
                } else if (asal === 'Pelabuhan Bastion Ternate') {
                    tujuan.value = 'Pelabuhan Laut Jailolo';
                } else {
                    tujuan.value = '';
                }
            });
        }

    </script>

    @include('layouts.admin.script')

</body>

</html>
