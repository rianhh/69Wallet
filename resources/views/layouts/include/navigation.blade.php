<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-light sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('assets/69wallet.png') }}" width="125px" alt="">
            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        {{-- ======= UNTUK USER ====== --}}
        @if (Auth::user()->role_id == 0)
            <li class="nav-item {{ request()->is('dashboard_user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard_user.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt text-black" style="color : black;"></i>
                    <span style="color: black;"
                        class="{{ request()->is('dashboard_user') ? 'text-black' : '' }}">Dashboard</span></a>
            </li>

            <li class="nav-item {{ request()->is('kategori_produk') ? 'active' : '' }}" style="color: black;">
                <a class="nav-link" href="{{ route('kategori_produk.index') }}">
                    <i style="color: black;" class="fas fa-fw fa-shopping-cart"></i>
                    <span style="color: black;"
                        class="{{ request()->is('kategori_produk') ? 'text-black' : '' }}">Produk</span></a>
            </li>

            <li class="nav-item {{ request()->is('reward') ? 'active' : '' }}" style="color: black;">
                <a class="nav-link" href="{{ route('reward') }}">
                    <i style="color: black;" class="fas fa-fw fa-award"></i>
                    <span style="color: black;"
                        class="{{ request()->is('kategori_produk') ? 'text-black' : '' }}">Reward</span></a>
            </li>
        @endif
        {{-- =====UNTUK ADMIN ===== --}}
        @if (Auth::user()->role_id == 1)
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt" style="color : black;"></i>
                    <span style="color:black;">Dashboard</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}" style="color:black;">
                    <i class="fas fa-fw fa-table" style="color : black;"></i>
                    <span style="color:black;">User</span></a>
            </li>
            <li class="nav-item {{ request()->is('admin/kategori') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    <i class="fas fa-fw fa-tag" style="color : black;"></i>
                    <span style="color:black;">Kategori</span></a>
            </li>
            <li class="nav-item {{ request()->is('admin/produk') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('produk.index') }}">
                    <i class="fas fa-fw fa-shopping-cart" style="color : black;"></i>
                    <span style="color:black;">Produk</span></a>
            </li>
            <li class="nav-item {{ request()->is('admin/rewards') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('rewards.index') }}">
                    <i class="fas fa-fw fa-medal" style="color : black;"></i>
                    <span style="color:black;">Rewards</span></a>
            </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column bg-white">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="color: #F7F4F4;">
                @if (Auth::user()->role_id == 1)
                    @if (request()->path() == 'admin/dashboard')
                        <div class="text-primary font-weight-bold">Dashboard</div>
                    @elseif(request()->path() == 'admin/produk')
                        <div class="text-primary font-weight-bold">Produk</div>t
                    @elseif(request()->path() == 'admin/rewards')
                        <div class="text-primary font-weight-bold">Reedem</div>
                    @elseif(request()->path() == 'admin/kategori')
                        <div class="text-primary font-weight-bold">Kategori</div>
                    @elseif(request()->path() == 'admin/user')
                        <div class="text-primary font-weight-bold">User</div>
                    @endif
                @elseif(Auth::user()->role_id == 0)
                    @if (Route::current()->getName() == 'dashboard_user.index')
                        <div class="text-primary font-weight-bold">Dashboard</div>
                    @elseif(Route::current()->getName() == 'kategori_produk.index')
                        <div class="text-primary font-weight-bold">Produk</div>t
                    @elseif(Route::current()->getName() == 'reward')
                        <div class="text-primary font-weight-bold">Reedem</div>
                    @elseif(request()->path() == 'profile')
                        <div class="text-primary font-weight-bold">Profile</div>
                    @elseif(Route::current()->getName() == 'generated::Vj2fq1uMv5VmhvYQ')
                        <div class="text-primary font-weight-bold">History Transaction</div>
                    @endif
                @endif
                {{-- {{ dd(Route::current()->getName()) }} --}}

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-dark bg-black d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars" style="color: black;"></i>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session('name') }}</span>
                            <img class="img-profile rounded-circle"
                                src="{{ asset('storage/storage/' . session('image')) }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ url('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <!-- /.container-fluid -->

            <div class="">
                @yield('content')
            </div>
