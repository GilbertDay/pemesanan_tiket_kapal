<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.meta')

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
                    <h1 class="mb-6 text-lg font-semibold text-black ">Data Penumpang</h1>
                    <!-- DataTales Example -->
                    <div class="mb-4 shadow card">

                        <div class="text-black card-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelPenumpang" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-black">
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Hp</th>
                                            <th>No Darurat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($penumpang as $p)
                                        <tr class="text-black">
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->alamat}}</td>
                                            <td>{{$p->jenis_kelamin}}</td>
                                            <td>{{$p->no_telp}}</td>
                                            <td>{{$p->no_telp_darurat}}</td>
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
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="my-auto text-center copyright">
                        <span>Copyright &copy; Website 2024</span>
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

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Nama
                        </label>
                        <input name="nama" required
                            class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan Nama" />

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Jenis Kelamin
                        </label>
                        <select id="layanan" name="jenis_kelamin" required
                            class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500">
                            <option value="" class="hidden">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            Alamat
                        </label>
                        <input name="nama" required
                            class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan Alamat" />

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            No Telp
                        </label>
                        <input name="nama" required
                            class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan No Telp" />

                        <label class="block mb-1 font-bold text-start" for="inline-full-name">
                            No Telp Darurat
                        </label>
                        <input name="nama" required
                            class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Masukan No Telp" />

                        <!-- <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                        No Telp
                                    </label>
                                    <input name="no_telp" required
                                        class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name" type="text" placeholder="Masukan No Telp" />
                                </div>
                                <div class="w-1/2">
                                    <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                        No Telp Darurat
                                    </label>
                                    <input name="no_telp_darurat" required
                                        class="w-full px-1 py-2 mb-3 leading-tight text-gray-800 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name" type="text" placeholder="Masukan No Telp Darurat" />
                                </div>
                            </div> -->

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
    <!-- End Form Tambah Penumpang -->

    @include('layouts.admin.script')


</body>

</html>
