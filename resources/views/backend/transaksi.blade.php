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
                    <h1 class=" mb-6 text-gray-800 text-lg">Data Transaksi</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body-table">
                            <div class="mb-3 px-3 py-1 bg-yellow-500 text-white font-semibold text-center">Transaksi
                                Pending</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Penumpang</th>
                                            <th>Jenis Layanan</th>
                                            <th>Jumlah Kursi</th>
                                            <th>No Telepon</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi_pending as $trx)
                                        <tr>
                                            <td>{{$trx->penumpang->nama}}</td>
                                            <td>{{$trx->jenis_layanan}}</td>
                                            <td>{{$trx->jumlah_kursi}}</td>
                                            <td>{{$trx->penumpang->no_telp}} - {{$trx->penumpang->no_telp_darurat}}</td>
                                            <td>{{$trx->total}}</td>
                                            <td>
                                                <button>Acc</button>
                                                <button>Reject</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body-table">
                            <div class="mb-3 px-3 py-1 bg-green-500 text-white font-semibold text-center">Transaksi
                                Sukses</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Penumpang</th>
                                            <th>Jenis Layanan</th>
                                            <th>Jumlah Kursi</th>
                                            <th>No Telepon</th>
                                            <th>Jumlah Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi_sukses as $trx)
                                        <tr>
                                            <td>{{$trx->penumpang->nama}}</td>
                                            <td>{{$trx->jenis_layanan}}</td>
                                            <td>{{$trx->jumlah_kursi}}</td>
                                            <td>{{$trx->penumpang->no_telp}} - {{$trx->penumpang->no_telp_darurat}}</td>
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
