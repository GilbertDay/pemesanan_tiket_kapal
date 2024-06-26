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
                            <a href="#"
                                class="rounded-full border-2 px-3 py-2 border-slate-500 bg-[#151F57] hover:text-white hover:no-underline text-stone-100 text-center">Tambah
                                Speedboat</a>
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
                                            <td>{{$mp->nama_bank}}</td>
                                            <td>{{$mp->nama_bank}}</td>
                                            <td>{{$mp->no_rek}}</td>
                                            <td>{{$mp->nama_rekening}}</td>
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


</body>

</html>
