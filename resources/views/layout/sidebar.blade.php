<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">

    {{-- Role Admin --}}
    @if (session('id_role') == 1)
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/dashboard') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ Request::is('admin/barang') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/barang') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/barang') }}">
                <i class="fa fa-archive"></i>
                <span>Data Barang</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ Request::is('admin/barang-masuk') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/barang-masuk') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/barang-masuk') }}">
                <i class="fa fa-download"></i>
                <span>Barang Masuk</span>
            </a>
        </li>



        <li class="nav-item {{ Request::is('admin/barang-keluar') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/barang-keluar') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/barang-keluar') }}">
                <i class="fa fa-upload"></i>
                <span>Barang Keluar</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ Request::is('admin/user') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/user') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/user') }}">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Manajemen User</span>
            </a>
        </li>

        <hr class="sidebar-divider">
    @endif



    {{-- Role User --}}
    @if (session('id_role') == 2)
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/dashboard') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ Request::is('admin/barang') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/barang') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/barang') }}">
                <i class="fa fa-archive"></i>
                <span>Data Barang</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ Request::is('admin/barang-masuk') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/barang-masuk') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/barang-masuk') }}">
                <i class="fa fa-download"></i>
                <span>Barang Masuk</span>
            </a>
        </li>



        <li class="nav-item {{ Request::is('admin/barang-keluar') ? 'active bg-warning' : '' }}"
            style="{{ Request::is('admin/barang-keluar') ? 'border-radius: 15px;' : '' }}">
            <a class="nav-link" href="{{ url('admin/barang-keluar') }}">
                <i class="fa fa-upload"></i>
                <span>Barang Keluar</span>
            </a>
        </li>

        <hr class="sidebar-divider">
    @endif

    <!--end navigation-->
</aside>
<!--end sidebar -->
