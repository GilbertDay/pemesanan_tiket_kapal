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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4 h-auto">

                            <!-- Color System -->
                            <div class="row">

                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#F9A119] shadow text-white ">
                                        <div class="card-body flex flex-col">
                                            <div>Penumpang</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_penumpang}}
                                            </div>
                                            <a href="/admin/penumpang"
                                                class="text-end text-white text-xs hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#8C52FF] shadow text-white ">
                                        <div class="card-body flex flex-col">
                                            <div>Speedboat</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_speedboat}}
                                            </div>
                                            <a href="/admin/speedboat"
                                                class="text-end text-white text-xs hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#7ED957] shadow text-white ">
                                        <div class="card-body flex flex-col">
                                            <div>Jadwal</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_jadwal}}
                                            </div>
                                            <a href="/admin/jadwal"
                                                class="text-end text-white text-xs hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#FF3131] text-white shadow">
                                        <div class="card-body flex flex-col">
                                            <div>Transaksi</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_transaksi}}
                                            </div>
                                            <a href="/admin/transaksi"
                                                class="text-end text-white text-xs hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')
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

    <!-- Bootstrap core JavaScript-->
    @include('layouts.admin.script')

</body>

</html>
