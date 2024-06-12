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
                    <li class="breadcrumb-item active">Antrian</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('tambah_pemesanan'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('tambah_pemesanan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('delete_pemesanan'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('delete_pemesanan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('edit_pemesanan'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('edit_pemesanan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <h5 class="card-title">Daftar Antrian</h5>
                                <div class="card-tools my-3">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_antrian">
                                        <i class="bi bi-plus-square"></i> Tambah Antrian
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="tambah_antrian" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="/tambah_antrian" id="rooms-setting" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Antrian</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label fw-bold">Nama Customer</label>
                                                        <select name="user_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                            <option selected hidden>Pilih Customer</option>
                                                            @foreach ($user as $p)
                                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Paket</label>
                                                        <select name="paket_id" id="paket_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                            <option selected hidden>Pilih Paket</option>
                                                            @foreach ($paket as $p)
                                                                <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_paket }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <label class="form-label fw-bold">Jumlah Paket</label>
                                                        <input type="number" min="1" name="jumlah_paket" id="jumlah_paket" class="form-control shadow-none" value="1" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Tujuan Pembayaran</label>
                                                        <select name="pembayaran_id" id="pembayaran_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                            <option selected hidden>Pilih Pembayaran</option>
                                                            @foreach ($pembayaran as $p)
                                                                <option value="{{ $p->id }}">{{ $p->nama_metode }} - {{ $p->rek_tujuan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Asal Pembayaran</label>
                                                        <select name="metode_asal" id="metode_asal" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                            <option selected hidden>Pilih Pembayaran</option>
                                                            @foreach ($pembayaran as $p)
                                                                <option value="{{ $p->nama_metode }}">{{ $p->nama_metode }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">No rekening/No E-wallet</label>
                                                        <input type="text" name="rek_asal" class="form-control shadow-none" placeholder="masukkan no rek/no ewallet" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Total Harga</label>
                                                        <input type="text" name="total_harga" id="total_harga" class="form-control shadow-none" placeholder="masukkan harga paket" readonly required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Bukti Pembayaran</label>
                                                        <input type="file" name="bukti_pembayaran" id="site_title_inp" class="form-control shadow-none" accept="image/*" required>
                                                    </div>
                                                    <input hidden type="text" name="status" class="form-control shadow-none" value="Proses">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                            </div>
                                        </div>
                                    </form>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($pesan as $item)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $item->user['nama'] }}</td>
                                                <td>{{ $item->user['no_wa'] }}</td>
                                                <td>{{ $item->paket['nama_paket'] }}</td>
                                                <td>{{ $item->jumlah_paket }}</td>
                                                <td>{{ $item->pembayaran['nama_metode'] }} - {{ $item->pembayaran['rek_tujuan'] }}</td>
                                                <td>{{ $item->metode_asal }} - {{ $item->rek_asal }}</td>
                                                <td>{{ $item->total_harga }}</td>
                                                <td>
                                                    <p>
                                                        <a href="#" class="link-offset-2 link-underline link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#lihat-gambar-{{ $item->id }}">
                                                            Bukti
                                                        </a>
                                                    </p>
                                                    <div class="modal fade" id="lihat-gambar-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content" style="background-color: transparent; border:0;">
                                                                <div class="modal-header" style="border-bottom:0;">
                                                                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-0 d-flex justify-content-center">
                                                                    <img src="{{ asset('assets/img/upload/'.$item->bukti_pembayaran)}}" alt="{{ $item->bukti_pembayaran }}" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#lunas{{ $item->id }}">
                                                        <i class="bi bi-check-square"></i>
                                                    </a>
                                                    <!-- Modal for confirming payment -->
                                                    <div class="modal fade" id="lunas{{ $item->id }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Pembayaran</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <b>Apakah benar pembayaran lunas?</b>
                                                                    <p>
                                                                        No Seller : {{ $item->pembayaran['nama_metode'] }} - {{ $item->pembayaran['rek_tujuan'] }}
                                                                    </p>
                                                                    <p>
                                                                        No Customer : {{ $item->metode_asal }} - {{ $item->rek_asal }}
                                                                    </p>
                                                                    <img src="{{ asset('assets/img/upload/'.$item->bukti_pembayaran)}}" alt="{{ $item->bukti_pembayaran }}" class="img-fluid">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                    <a type="button" href="{{ route('pesanankonfirmasi', ['id' => $item->id]) }}" target="_blank" class="btn btn-primary">Iya</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                    <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah benar Anda ingin menghapus Pemesanan ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                    @method('delete')
                                                                    @csrf
                                                                    <a type="button" href="{{ route('delete_pemesanan', ['id' => $item->id]) }}" class="btn btn-primary">Iya</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paketSelect = document.getElementById('paket_id');
            const jumlahPaketInput = document.getElementById('jumlah_paket');
            const totalHargaInput = document.getElementById('total_harga');

            function updateTotalHarga() {
                const selectedPaket = paketSelect.options[paketSelect.selectedIndex];
                const harga = selectedPaket.getAttribute('data-harga');
                const jumlah = jumlahPaketInput.value;
                totalHargaInput.value = harga ? harga * jumlah : '';
            }

            paketSelect.addEventListener('change', updateTotalHarga);
            jumlahPaketInput.addEventListener('input', updateTotalHarga);
        });
        </script>

</body>

</html>
