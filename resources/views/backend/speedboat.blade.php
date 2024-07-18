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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('layouts.admin.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="mb-6 text-lg text-gray-800 ">Data Speedboat</h1>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="mb-4 shadow card">
                        <div class="py-3 card-header">
                            <button type="button" data-toggle="modal" data-target="#tambahSpeedboat"
                                class="rounded-full border-2 px-3 py-2 border-slate-500 bg-[#151F57] hover:text-white hover:no-underline text-stone-100 text-center">Tambah
                                Speedboat</button>
                        </div>
                        <div class="card-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kapasitas Kursi</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($speedboat as $s)
                                        <tr>
                                            <td>{{$s->nama_speedboat}}</td>
                                            <td>{{$s->kapasitas_kursi}}</td>
                                            <td>{{$s->harga_normal}}</td>

                                            <td>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#updateSpeedboat{{$s->id}}"
                                                    class="p-2 text-black bg-blue-400 rounded-lg">Edit</button>
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" data-toggle="modal"
                                                    data-target="#deleteSpeedboat{{ $s->id }}"
                                                    class="p-2 text-black bg-red-500 rounded-lg">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="flex justify-end px-3">
                            {{ $speedboat->links() }}
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



    <!-- Form Tambah Speedboat  -->
    <div class="modal fade" id="tambahSpeedboat" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="tambahSpeedboatLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSpeedboatLabel">Tambah Speedboat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/tambahSpeedboat" method="POST" class="text-black">
                        @csrf
                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Nama Speedboat
                        </label>
                        <input
                            class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                            name="nama_speedboat" type="text" required placeholder="Nama Speedboat" />


                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Kapasitas Kursi
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="kapasitas_kursi" type="number" required placeholder="Kapasitas Kursi" />
                            </div>
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Harga
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="harga_speedboat" type="number" required placeholder="Harga Speedboat" />
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
    <!-- End Form Tambah Speedboat -->

    <!-- Form Update Speedboat  -->
    @foreach($speedboat as $spd)
    <div class="modal fade" id="updateSpeedboat{{$spd->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="updateSpeedboatLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSpeedboatLabel">Update Speedboat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/updateSpeedboat" method="POST" class="text-black">
                        @csrf
                        <!-- Assuming we use a hidden input to pass the ID of the speedboat schedule -->
                        <input type="hidden" name="id_speedboat" value="{{ $spd->id }}">

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Nama Speedboat
                        </label>
                        <input
                            class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                            name="nama_speedboat" type="text" required placeholder="Nama Speedboat"
                            value="{{ $spd->nama_speedboat }}" />

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Kapasitas Kursi
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="kapasitas_kursi" type="number" required placeholder="Kapasitas Kursi"
                                    value="{{ $spd->kapasitas_kursi }}" />
                            </div>
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Harga
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="harga" type="number" required placeholder="Harga Speedboat"
                                    value="{{ $spd->harga_normal }}" />
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
    <!-- End Form Update Speedboat -->

    <!-- Form Delete Speedboat  -->
    <div class="modal fade" id="deleteSpeedboat{{$spd->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="deleteSpeedboatLabel{{$spd->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSpeedboatLabel{{$spd->id }}">Hapus Data Speedboat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus {{$spd->nama_speedboat }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-2 py-2 text-white bg-gray-600 rounded-lg"
                        data-dismiss="modal">Batal</button>
                    <form action="/admin/deleteSpeedboat" method="POST">
                        @csrf
                        <input type="hidden" name="id_speedboat" value="{{$spd->id }}">
                        <button type="submit" class="px-2 py-2 text-white bg-red-500 rounded-lg">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Delete Speedboat -->


    @endforeach

    @include('layouts.admin.script')

</body>

</html>
