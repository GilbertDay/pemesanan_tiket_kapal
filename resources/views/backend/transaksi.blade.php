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
                    <h1 class="mb-6 text-lg text-gray-800 ">Data Transaksi</h1>

                    <!-- DataTales Example -->
                    <div class="mb-4 shadow card">
                        <div class="card-body-table">
                            <div class="px-3 py-1 mb-3 font-semibold text-center text-white bg-yellow-500">Transaksi
                                Pending</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemesan</th>
                                            <th>Jenis Layanan</th>
                                            <th>Jumlah Kursi</th>
                                            <th>No Telepon</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi_pending as $trx)
                                        <tr>
                                            <td>{{$trx->user->name}}</td>
                                            <td>{{$trx->jenis_layanan}}</td>
                                            <td>{{$trx->jumlah_kursi}}</td>
                                            <td>{{$trx->user->no_telp}}</td>
                                            <td>{{$trx->total}}</td>
                                            <td><button class="p-2 text-white bg-blue-500 rounded-xl">Detail
                                                    Pesanan</button></td>
                                            <td>
                                                <button class="p-2 text-white bg-green-500 rounded-xl">Accept</button>
                                                <button class="p-2 text-white bg-red-500 rounded-xl">Reject</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 shadow card">
                        <div class="card-body-table">
                            <div class="px-3 py-1 mb-3 font-semibold text-center text-white bg-green-500">Transaksi
                                Sukses</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemesan</th>

                                            <th>Jenis Layanan</th>
                                            <th>Jumlah Kursi</th>
                                            <th>No Telepon</th>
                                            <th>Jumlah Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi_sukses as $trx)
                                        <tr>
                                            <td>{{$trx->user->name}}</td>

                                            <td>{{$trx->jenis_layanan}}</td>
                                            <td>{{$trx->jumlah_kursi}}</td>
                                            <td>{{$trx->user->no_telp}}</td>

                                            <td>{{$trx->total}}</td>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
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


</body>

</html>
