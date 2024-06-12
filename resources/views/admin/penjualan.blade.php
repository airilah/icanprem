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
            <h1>I Can Premium</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Pemesanan</li>
                    <li class="breadcrumb-item active">Penjualan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <h5 class="card-title">Daftar Penjualan</h5>
                                <div class="card-tools my-3">
                                    <a type="button" class="btn btn-success" href="/cetak_laporan">
                                        Export PDF
                                    </a>
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No WA</th>
                                            <th style="width: 10%">Paket</th>
                                            <th>Jumlah</th>
                                            <th>Norek asal</th>
                                            <th>Norek Cust</th>
                                            <th>Total Harga</th>
                                            <th>Bukti</th>
                                            <th>Tgl/bln/thn</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($penjualan as $item)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $item->user['nama'] }}</td>
                                                <td>{{ $item->user['no_wa'] }}</td>
                                                <td>{{ $item->paket['nama_paket'] }}</td>
                                                <td>{{ $item->jumlah_paket }}</td>
                                                <td>{{ $item->pembayaran['nama_metode'] }} - {{ $item->pembayaran['rek_tujuan'] }}</td>
                                                <td>{{ $item->metode_asal }} - {{ $item->rek_asal }}</td>
                                                <td>{{ $item->total_harga }}</td>
                                                <td><img src="{{ asset('assets/img/upload/'.$item->bukti_pembayaran)}}" alt="{{ $item->bukti_pembayaran }}" style="width: 50px" class="img-fluid"></td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <style>
                                .table-responsive {
                                    overflow-x: auto;
                                }
                                .table {
                                    min-width: 1500px; /* Adjust the min-width as needed */
                                }
                            </style>
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
