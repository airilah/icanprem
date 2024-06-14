<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.jpg') }}" alt="">
            <span class="d-none d-lg-block">Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/admin.png') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->nama }}</h6>
                        <span>Admin - I Can Premium</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/profile_admin" >
                            <i class="bi bi-person"></i>
                            <span>Profil Saya</span>
                        </a>
                    </li>
                    <div class="modal fade" id="profil" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="#" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Profil Admin</h5>
                                    </div>
                                    <div class="modal-body">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control shadow-none" value="{{ auth()->user()->nama }}" readonly>
                                    </div>
                                    <div class="modal-body">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control shadow-none" value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                    <div class="modal-body">
                                        <label for="no_wa" class="form-label">No WhatsApp</label>
                                        <input type="text" name="no_wa" class="form-control shadow-none" value="{{ auth()->user()->no_wa }}" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>

</header>


<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#katalog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Katalog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="katalog-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('daftar_produk') }}">
                        <i class="bi bi-circle"></i><span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('daftar_paket') }}">
                        <i class="bi bi-circle"></i><span>Paket</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pemesanan-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Pemesanan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pemesanan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('daftar_keranjang') }}">
                        <i class="bi bi-circle"></i><span>Keranjang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('daftar_antrian') }}">
                        <i class="bi bi-circle"></i><span>Antrian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('daftar_penjualan') }}">
                        <i class="bi bi-circle"></i><span>Penjualan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End pemesanan Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#komponen-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Komponen</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="komponen-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('daftar_pembayaran') }}">
                        <i class="bi bi-circle"></i><span>Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('daftar_slider') }}">
                        <i class="bi bi-circle"></i><span>Slider</span>
                    </a>
                </li>
            </ul>
        </li><!-- End komponen Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#akun-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Profil</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="akun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('akun_cust') }}">
                        <i class="bi bi-circle"></i><span>Akun Customer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('akun_admin') }}">
                        <i class="bi bi-circle"></i><span>Akun Admin</span>
                    </a>
                </li>
            </ul>
        </li><!-- End akun Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->
    </ul>

</aside><!-- End Sidebar-->

