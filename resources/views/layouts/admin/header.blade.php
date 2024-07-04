<nav class="navbar navbar-expand navbar-light bg-[#151F57] topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="ml-auto navbar-nav">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-light-600 small">Admin</span>
                <div class=""><i class="fas fa-user"></i></div>

            </a>
            <!-- Dropdown - User Information -->
            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">

                <form action="/logout" method="POST" class="inline dropdown-item">
                    @csrf
                    <i class="text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                    <button type="submit" class="px-4">
                        Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
