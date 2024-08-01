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
                    <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                        <h1 class="mb-0 text-gray-800 h3">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="h-auto mb-4 col-lg-12">

                            <!-- Color System -->
                            <div class="row">

                                <div class="mb-4 col-xl-3">
                                    <div class="bg-[#F9A119] shadow text-white ">
                                        <div class="flex flex-col card-body">
                                            <div>Penumpang</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_penumpang}}
                                            </div>
                                            <a href="/admin/penumpang"
                                                class="text-xs text-white text-end hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 col-xl-3">
                                    <div class="bg-[#8C52FF] shadow text-white ">
                                        <div class="flex flex-col card-body">
                                            <div>Speedboat</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_speedboat}}
                                            </div>
                                            <a href="/admin/speedboat"
                                                class="text-xs text-white text-end hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 col-xl-3">
                                    <div class="bg-[#7ED957] shadow text-white ">
                                        <div class="flex flex-col card-body">
                                            <div>Jadwal</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_jadwal}}
                                            </div>
                                            <a href="/admin/jadwal"
                                                class="text-xs text-white text-end hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 col-xl-3">
                                    <div class="bg-[#FF3131] text-white shadow">
                                        <div class="flex flex-col card-body">
                                            <div>Transaksi</div>
                                            <div class="flex justify-center items-center h-full text-[40px] font-bold">
                                                {{$data_transaksi}}
                                            </div>
                                            <a href="/admin/transaksi"
                                                class="text-xs text-white text-end hover:no-underline">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <div class="text-center">Transaksi Harian</div>
                            <div>
                                <div class="p-4 my-3 bg-white rounded shadow ">
                                    {!! $chart_transaksi->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div class="text-center">Rute Kapal</div>
                            <div>
                                <div class="p-4 my-3 bg-white rounded shadow ">
                                    {!! $chart_rute_by_speedboat->container() !!}

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

    <!-- Bootstrap core JavaScript-->
    @include('layouts.admin.script')
    <script src="{{ $chart_transaksi->cdn() }}"></script>
    {{ $chart_transaksi->script() }}
    <script src="{{ $chart_rute_by_speedboat->cdn() }}"></script>
    {{ $chart_rute_by_speedboat->script() }}



</body>

</html>
