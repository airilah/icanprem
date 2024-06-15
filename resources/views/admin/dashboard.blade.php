<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.head_admin')
</head>

<body>

    <!-- ======= Header ======= -->
    <!-- ======= Sidebar ======= -->
    @include('admin.template.nav_admin')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card antri-card">
                                <div class="card-body">
                                    <h5 class="card-title">Antrian <span>| Semua</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $antri }} Pesanan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Penjualan <span>| Semua</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $digunakan }} Transaksi</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Penghasilan <span>| Semua</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ 'Rp ' . number_format($income, 0, ',', '.') }}</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-6">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Pendaftar <span>| Semua</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $customer }} Akun</h6>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body">
                                    <a href="/daftar_antrian">
                                        <h5 class="card-title">Tabel Antrian <span>| Semua</span></h5>
                                    </a>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Paket</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Tgl/bln/thn</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pesan as $item)
                                            <tr>
                                                <td>{{ $item->user['nama'] }}</td>
                                                <td>{{ $item->paket['nama_paket'] }}</td>
                                                <td>{{ $item->jumlah_paket }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td style="color: red"><b>{{ $item->status }}</b></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body">
                                    <a href="/penjualan">
                                        <h5 class="card-title">Tabel Penjualan <span>| Semua</span></h5>
                                    </a>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Paket</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Tgl/bln/thn</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jual as $item)
                                                <tr>
                                                    <td>{{ $item->user['nama'] }}</td>
                                                    <td>{{ $item->paket['nama_paket'] }}</td>
                                                    <td>{{ $item->jumlah_paket }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td style="color: green"><b>{{ $item->status }}</b></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <a href="/paket">
                                <h5 class="card-title">Stok Paket <span>| Semua</span></h5>
                            </a>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Paket</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paket as $item)
                                        <tr>
                                            <td>{{ $item->nama_paket }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>{{ $item->harga }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('admin.template.footer_admin')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main_admin.js') }}"></script>

</body>

</html>
