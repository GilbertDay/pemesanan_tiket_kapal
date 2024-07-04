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
                    <h1 class="mb-6 text-lg text-gray-800 ">Data Metode Pembayaran</h1>

                    <!-- DataTales Example -->
                    <div class="mb-4 shadow card">
                        <div class="py-3 card-header">
                            <button type="button" data-toggle="modal" data-target="#tambahMetodePembayaran"
                                class="rounded-full border-2 px-3 py-2 border-slate-500 bg-[#151F57] hover:text-white hover:no-underline text-stone-100 text-center">Tambah
                                Metode Pembayaran</button>
                        </div>
                        <div class="card-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Nama Bank</th>
                                            <th>Nomor Rekening</th>
                                            <th>Nama Rekening</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($metodePembayaran as $mp)

                                        <tr>
                                            <td>
                                                <img src="{{asset($mp->img)}}" alt=""
                                                    class="block ml-auto mr-auto max-w-12">
                                            </td>
                                            <td class="align-middle">{{$mp->nama_bank}}</td>
                                            <td class="align-middle">{{$mp->no_rek}}</td>
                                            <td class="align-middle">{{$mp->nama_rekening}}</td>
                                            <td class="align-middle">
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
    <div class="modal fade" id="tambahMetodePembayaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="tambahMetodePembayaranLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMetodePembayaranLabel">Tambah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/tambahMetodePembayaran" method="POST" enctype="multipart/form-data"
                        class="text-black">
                        @csrf
                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Nama Bank
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="nama_bank" type="text" required placeholder="Kapasitas Kursi" />
                            </div>
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Foto
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="logo_bank" type="file" required />
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Nomor Rekening
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="nomor_rekening" type="number" required placeholder="Kapasitas Kursi" />
                            </div>
                            <div class="w-1/2">
                                <label class="block mb-1 font-bold text-start" for="inline-full-name">
                                    Nama Rekening
                                </label>
                                <input
                                    class="w-full px-1 py-2 mb-2 text-gray-800 bg-gray-200 border-2 border-gray-200 rounded focus:border-purple-500"
                                    name="nama_rekening" type="text" required placeholder="Harga Speedboat" />
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

</body>

</html>
