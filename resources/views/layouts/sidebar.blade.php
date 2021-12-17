<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>SIPERU</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/admin.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">Menu Utama</li>
                <li class="nav-item ">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-home" aria-hidden="true"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/ruang" class="nav-link">
                        <i class="fa fa-building nav-icon" aria-hidden="true"></i>
                        <p> Data Ruang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/barang" class="nav-link">
                        <i class="fa fa-folder nav-icon" aria-hidden="true"></i>
                        <p> Data Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/peminjaman" class="nav-link">
                        <i class="far fa fa-list nav-icon"></i>
                        <p> Data Peminjaman</p>
                    </a>
                </li>
                @if (auth()->user()->level == 'Admin' || auth()->user()->level == 'Moderator')
                    <li class="nav-item">
                        <a href="/pengguna" class="nav-link">
                            <i class="fa fa-user nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('formpeminjaman') }}" class="nav-link">
                            <i class="fas fa-pencil-alt nav-icon"></i>
                            <p>Pinjam Ruangan</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
