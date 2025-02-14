<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">

    <!-- CSS Libraries -->
    @stack('styles')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    {{-- <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png"
                                        alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png"
                                        alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png"
                                        alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </form>
                <ul class="navbar-nav navbar-right">

                    {{-- ! Nama User --}}
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
                            <a href="#" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('post.logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="submit" value="Logout" class="dropdown-item has-icon text-danger">

                                </input>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#!">SDM</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#!">SDM</a>
                    </div>
                </aside>

                <ul class="sidebar-menu">
                    {{-- ! Sidebar superadmin --}}
                    @if(Auth::user()->role == 'superadmin')
                    <li class="menu-header">Home</li>
                    <li><a class="nav-link" href="{{ route('dashboard.superadmin') }}"><i class="fas fa-fire"></i>
                            <span>Dashboard</span></a>
                    <li class="menu-header">Managemen User</li>
                    <li><a class="nav-link" href="{{route('page.user') }}"><i class="far fa-user"></i> <span>Managemen
                                User</span></a>
                    <li><a class="nav-link" href="{{route('get.list.cuti.user') }}"><i class="far fa-user"></i> <span>
                                Pengajuan Cuti User</span></a>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                            <span>Managemen Cuti</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('page.format.cuti')}}">Format Cuti</a>
                            </li>
                            <li><a class="nav-link"
                                    href="{{ route('form.pengajuan.cuti',Auth::user()->name) }}">Pengajuan
                                    Cuti</a></li>
                            <li><a class="nav-link" href="layout-top-navigation.html"></a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'admin')
                    <li class="menu-header">Home</li>
                    <li><a class="nav-link" href="{{ route('dashboard.admin') }}"><i class="fas fa-fire"></i>
                            <span>Dashboard</span></a>
                    <li class="menu-header">Managemen Pegawai</li>
                    <li><a class="nav-link" href="{{route('page.user') }}"><i class="far fa-user"></i> <span>Managemen
                                Pegawai</span></a>
                    <li><a class="nav-link" href="{{route('get.list.cuti.user') }}"><i class="far fa-user"></i> <span>
                                Pengajuan Cuti Pegawai</span></a>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                            <span>Managemen Cuti</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('page.format.cuti')}}">Format Cuti</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('page.pengajuan.cuti',Auth::user()->id) }}">Pengajuan
                                    Cuti</a></li>
                            <li><a class="nav-link" href="layout-top-navigation.html"></a></li>
                        </ul>
                    <li><a class="nav-link" href="{{ route('pengajuan.cutiper.user',Auth::user()->id) }}"><i
                                class="far fa-file-alt"></i>
                            <span>Pengajuan Cuti Saya</span></a>
                    </li>
                    @endif

                    @if (Auth::user()->role == 'staff')
                    <li class="menu-header">Home</li>
                    <li><a class="nav-link" href="{{ route('dashboard.staff') }}"><i class="fas fa-fire"></i>
                            <span>Dashboard</span></a>
                    <li class="menu-header">Cuti</li>
                    <li><a class="nav-link" href="{{ route('halaman.form.cuti.staff', Auth::user()->id) }}"><i
                                class="far fa-file-alt"></i>
                            <span>History</span></a>
                    <li class="menu-header">Izin</li>
                    <li><a class="nav-link" href="#"><i class="far fa-file-alt"></i>
                            <span>History</span></a>
                    <li><a class="nav-link" href="{{ route('halaman.histori.izin.staff',Auth::user()->id) }}"><i
                                class="far fa-file-alt"></i>
                            <span>Pengajuan</span></a>
                        @endif

                        @if (Auth::user()->role == 'dosen')
                    <li class="menu-header">Home</li>
                    <li><a class="nav-link" href="{{ route('dashboard.dosen') }}"><i class="fas fa-fire"></i>
                            <span>Dashboard</span></a>
                    <li class="menu-header">Cuti</li>
                    <li><a class="nav-link" href="{{ route('',Auth::user()->id) }}"><i class="far fa-file-alt"></i>
                            <span>History</span></a>
                    <li><a class="nav-link" href="{{ route('halaman.form.cuti.dosen',Auth::user()->name) }}"><i
                                class="far fa-file-alt"></i>
                            <span>Pengajuan</span></a>
                    <li class="menu-header">Izin</li>
                    <li><a class="nav-link" href="#"><i class="far fa-file-alt"></i>
                            <span>History</span></a>
                    <li><a class="nav-link" href="{{ route('halaman.histori.izin.dosen',Auth::user()->id) }}"><i
                                class="far fa-file-alt"></i>
                            <span>Pengajuan</span></a>
                        @endif

                </ul>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2025 <div class="bullet"></div> Design By <a href="https://nauv.al/">Universitas
                        Satya Terra Bhinneka</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src='{{ asset(' assets/js/custom.js') }}'></script>


    <!-- Page Specific JS File -->
</body>

</html>