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
                    <h1 class=" mb-6 text-gray-800 text-lg">Data Penumpang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" data-toggle="modal" data-target="#tambahPenumpang"
                                class=" rounded-full  border-2 px-3 py-2 border-slate-500 bg-[#151F57] w-fit text-stone-100 text-center">
                                Tambah
                                Penumpang</button>
                        </div>
                        <div class="card-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Hp</th>
                                            <th>No Darurat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($penumpang as $p)
                                        <tr>
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->alamat}}</td>
                                            <td>{{$p->jenis_kelamin}}</td>
                                            <td>{{$p->no_telp}}</td>
                                            <td>{{$p->no_telp_darurat}}</td>
                                            <td>
                                                <button>Edit</button>
                                                <button>Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->





            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Form Tambah Penumpang  -->
    <div class="modal fade" id="tambahPenumpang" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="tambahPenumpangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPenumpangLabel">Tambah Penumpang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/tambahPenumpang" method="POST" class="text-black">
                        @csrf

                        <label class="block mb-1 font-bold  text-start" for="inline-full-name">
                            Nama
                        </label>
                        <input name="nama" required
                            class=" w-full mb-3 px-1 py-2 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan Nama" />

                        <label class="block mb-1 font-bold  text-start" for="inline-full-name">
                            Jenis Kelamin
                        </label>
                        <select id="layanan" name="jenis_kelamin" required
                            class="text-gray-800 bg-gray-200 border-2 border-gray-200 focus:border-purple-500 rounded mb-2 px-1 py-2 w-full">
                            <option value="" class="hidden">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <label class="block mb-1 font-bold  text-start" for="inline-full-name">
                            Alamat
                        </label>
                        <input name="nama" required
                            class=" w-full mb-3 px-1 py-2 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan Alamat" />

                        <label class="block mb-1 font-bold  text-start" for="inline-full-name">
                            No Telp
                        </label>
                        <input name="nama" required
                            class=" w-full mb-3 px-1 py-2 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan No Telp" />

                        <label class="block mb-1 font-bold  text-start" for="inline-full-name">
                            No Telp Darurat
                        </label>
                        <input name="nama" required
                            class=" w-full mb-3 px-1 py-2 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan No Telp" />

                        <!-- <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                        No Telp
                                    </label>
                                    <input name="no_telp" required
                                        class=" w-full mb-3 px-1 py-2 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name" type="text" placeholder="Masukan No Telp" />
                                </div>
                                <div class="w-1/2">
                                    <label class="block mb-1 font-bold  text-start" for="inline-full-name">
                                        No Telp Darurat
                                    </label>
                                    <input name="no_telp_darurat" required
                                        class=" w-full mb-3 px-1 py-2 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name" type="text" placeholder="Masukan No Telp Darurat" />
                                </div>
                            </div> -->

                        <div class="modal-footer">
                            <button type="button" class="px-2 py-2 rounded-lg text-white bg-gray-600"
                                data-dismiss="modal">Batal</button>
                            <button type="submit" class="px-2 py-2 rounded-lg text-white bg-purple-500">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Tambah Penumpang -->

</body>

</html>
