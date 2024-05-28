<!DOCTYPE html>
<html lang="en">

<head>

    @include('components.meta');

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('components.sidebar');
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('components.header');
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
                        <div class="col-lg-8 mb-4 h-auto">

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#F9A119] text-black shadow">
                                        <div class="card-body">
                                            Penumpang
                                            <div class="text-white-50 small mt-20 custom-link-card">
                                                <a href="#" class="text-white">Selengkapnya....</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#8C52FF] text-black shadow">
                                        <div class="card-body">
                                            Speedboat
                                            <div class="text-white-50 small mt-20 custom-link-card">
                                                <a href="#" class="text-white">Selengkapnya....</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#7ED957] text-black shadow">
                                        <div class="card-body">
                                            Jadwal
                                            <div class="text-white-50 small mt-20 custom-link-card">
                                                <a href="#" class="text-white">Selengkapnya....</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-4">
                                    <div class="bg-[#FF3131] text-black shadow">
                                        <div class="card-body">
                                            Transaksi
                                            <div class="text-white-50 small mt-20 custom-link-card">
                                                <a href="#" class="text-white">Selengkapnya....</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 mb-4 ml-auto">
                            <!-- Approach -->
                            <div class="shadow mb-4">
                                <div class="bg-[#ADACB8] h-[322px] rounded-xl">
                                    <div class="flex align-middle ml-2 mb-[20px]">
                                        <img src="admin/img/profil1.jpeg" class="rounded-full w-[40px] h-[45px] bg-contain mt-[10px]" alt="">
                                        <p class="text-center text-black mt-[20px] ml-[10px]">Srimayu Fara</p>
                                        <a href="" class="border-solid border-2 rounded-full border-orange-600 h-[28px] w-[28px] mt-[20px] ml-[80px] bg-orange-600 text-stone-100 text-center">></a>
                                    </div>
                                    <div class="flex align-middle ml-2 mb-[20px]">
                                        <img src="admin/img/profil1.jpeg" class="rounded-full w-[40px] h-[45px] bg-contain mt-[10px]" alt="">
                                        <p class="text-center text-black mt-[20px] ml-[10px]">Srimayu Fara</p>
                                        <a href="" class="border-solid border-2 rounded-full border-orange-600 h-[28px] w-[28px] mt-[20px] ml-[80px] bg-orange-600 text-stone-100 text-center">></a>
                                    </div>
                                    <div class="flex align-middle ml-2 mb-[20px]">
                                        <img src="admin/img/profil1.jpeg" class="rounded-full w-[40px] h-[45px] bg-contain mt-[10px]" alt="">
                                        <p class="text-center text-black mt-[20px] ml-[10px]">Srimayu Fara</p>
                                        <a href="" class="border-solid border-2 rounded-full border-orange-600 h-[28px] w-[28px] mt-[20px] ml-[80px] bg-orange-600 text-stone-100 text-center">></a>
                                    </div>
                                    <div class="text-center mt-10">
                                        <a href="#" class="text-amber-500 hover:no-underline hover:text-amber-500 font-semibold">Kelola Data User</a>
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
            @include('components.footer');
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
    @include('components.script');

</body>

</html>