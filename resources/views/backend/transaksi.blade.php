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
                    <h1 class="mb-6 text-lg font-semibold text-black ">Data Transaksi</h1>

                    <!-- DataTales Example -->
                    <div class="mb-4 shadow card">
                        <div class="text-black card-body-table">
                            <div class="px-3 py-1 mb-3 font-semibold text-center text-white bg-yellow-500">Transaksi
                                Pending</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelTransaksiPending" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr class="text-black">
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pemesan</th>
                                            <th>Id Pemesan</th>
                                            <th>Jenis Layanan</th>
                                            <th>Jumlah Kursi</th>
                                            <th>No Telepon</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Bukti Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi_pending as $trx)
                                        <tr class="text-black">
                                            <td>{{$trx->id}}</td>
                                            <td>{{ \Carbon\Carbon::parse($trx->created_at)->format('d-m-Y') }}</td>
                                            <td>{{$trx->user->name}}</td>
                                            <td>{{$trx->id_penumpang}}</td>
                                            <td>{{$trx->jenis_layanan}}</td>
                                            <td>{{$trx->jumlah_kursi}}</td>
                                            <td>{{$trx->user->no_telp}}</td>
                                            <td>{{ number_format($trx->total, 0, ',', '.') }}.000</td>
                                            <td><button type="button" data-toggle="modal" data-target="#{{$trx->id}}"
                                                    class="p-2 text-white bg-blue-500 rounded-xl">Lihat Bukti Bayar
                                                </button></td>
                                            <td class="flex gap-3">
                                                <form action="/admin/accTransaksi/{{$trx->id}}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="p-2 text-white bg-green-500 rounded-xl">Terima</button>
                                                </form>
                                                <form action="/admin/rejectTransaksi/{{$trx->id}}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="p-2 text-white bg-red-500 rounded-xl">Tolak</button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 shadow card ">
                        <div class="text-black card-body-table">
                            <div class="px-3 py-1 mb-3 font-semibold text-center text-white bg-green-500">Transaksi
                                Sukses</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelTransaksiTerima" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr class="text-black">
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pemesan</th>
                                            <th>Id Penumpang</th>
                                            <th>Jenis Layanan</th>
                                            <th>Jumlah Kursi</th>
                                            <th>No Telepon</th>
                                            <th>Jumlah Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                        @foreach($transaksi_sukses as $trx)
                                        <tr class="text-black">
                                            <td>{{$trx->id}}</td>
                                            <td>{{ \Carbon\Carbon::parse($trx->created_at)->format('d-m-Y') }}</td>
                                            <td>{{$trx->user->name}}</td>
                                            <td>{{$trx->penumpang_id}}</td>
                                            <td>{{$trx->jenis_layanan}}</td>
                                            <td>{{$trx->jumlah_kursi}}</td>
                                            <td>{{$trx->user->no_telp}}</td>
                                            <td>{{ number_format($trx->total, 0, ',', '.') }}.000</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
            <div class="mb-4 shadow card ">
                        <div class="text-black card-body-table">
                            <div class="px-3 py-1 mb-3 font-semibold text-center text-white bg-red-500">Transaksi
                                Gagal</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelTransaksireject" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr class="text-black">
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pemesan</th>
                                            <th>Penumpang Id</th>
                                            <th>Jenis Layanan</th>
                                            <th>Jumlah Kursi</th>
                                            <th>No Telepon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                        @foreach($transaksi_reject as $trx)
                                        <tr class="text-black">
                                            <td>{{$trx->id}}</td>
                                            <td>{{ \Carbon\Carbon::parse($trx->created_at)->format('d-m-Y') }}</td>
                                            <td>{{$trx->user->name}}</td>
                                            <td>{{$trx->penumpang_id}}</td>
                                            <td>{{$trx->jenis_layanan}}</td>
                                            <td>{{$trx->jumlah_kursi}}</td>
                                            <td>{{$trx->user->no_telp}}</td>

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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Tambah Jadwal  -->
    @foreach($transaksi_all as $trx)
    <div class="modal fade" id="{{$trx->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="buktiBayarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiBayarLabel">Bukti Bayar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="flex items-center justify-center w-full">
                        <img src="{{$trx->bukti_bayar}}" alt="" class="w-1/2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-2 py-2 text-white bg-gray-600 rounded-lg"
                        data-dismiss="modal">Keluar</button>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- End Form Tambah Jadwal -->
    @include('layouts.admin.script')

</body>

</html>
