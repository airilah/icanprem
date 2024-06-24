<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body class="starter-page-page">

    @include('template.nav')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Keranjang</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Keranjang</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                @if (session()->has('masuk_keranjang'))
                    <div class="alert alert-info alert-dismissible fade show text-start" role="alert">
                        {{ session('masuk_keranjang') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('hapus_keranjang'))
                    <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
                        {{ session('hapus_keranjang') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @foreach ($keranjang as $item)
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-1">
                                    <input type="checkbox" data-jumlah-paket="{{ $item->jumlah_paket }}" data-harga="{{ $item->harga }}" data-nama-paket="{{ $item->paket['nama_paket'] }}">
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="d-flex text-start">
                                        <img src="{{ asset('assets/img/' . $item->paket->produk['gambar1']) }}" class="card-img-top mx-2" style="width: 80px">
                                        <div class="text-start align-self-center">
                                            <p class="fs-4"><b>{{ $item->paket['nama_paket'] }}</b></p>
                                            <p><a href="#" data-bs-toggle="modal" data-bs-target="#catatan{{ $item->id }}">Catatan</a></p>
                                            <div class="modal fade" id="catatan{{ $item->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Catatan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-unstyled">
                                                                @php
                                                                    $catatan = explode("\n", $item->paket['catatan']);
                                                                @endphp
                                                                @foreach ($catatan as $catat)
                                                                    @if (strpos($catat, ';') !== false)
                                                                        @php
                                                                            $subCatatan = explode(';', $catat);
                                                                        @endphp
                                                                        @foreach ($subCatatan as $subCat)
                                                                            <li> - </i> {!! nl2br(e($subCat)) !!}</li>
                                                                        @endforeach
                                                                    @else
                                                                        <li> - </i> {!! nl2br(e($catat)) !!}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <p>Jumlah : {{ $item->jumlah_paket }}</p>
                                </div>
                                <div class="col-12 col-md-3">
                                    <h5>Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</h5>
                                </div>
                                <div class="col-12 col-md-1">
                                    <a type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">Hapus</a>
                                    <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Apakah benar Anda ingin menghapus Paket ini dari keranjang?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    @method('delete')
                                                    @csrf
                                                    <a type="button" href="{{ route('hapus_keranjang', ['id' => $item->id]) }}" class="btn btn-primary">Iya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-md-2 fs-5">
                                <input type="checkbox" id="select_all"> Pilih Semua
                            </div>
                            <div class="col-md-3 fs-5">
                                <b><p id="jumlah_paket" class="pe-4">Jumlah Paket: 0</p></b>
                            </div>
                            <div class="col-md-3 fs-5">
                                <b><p id="total_harga">Total Harga: Rp 0</p></b>
                            </div>
                            <div class="col-md-2 fs-5">
                                <a type="button" class="btn btn-info w-100" href="/#produk" style="color: white">Tambah lagi</a>
                            </div>
                            <div class="col-md-2 fs-5">
                                <a type="button" class="btn btn-success w-100" href="#" data-bs-toggle="modal" data-bs-target="#checkout{{ $item->id }}">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="POST" id="checkout-form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade" id="checkout{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content text-start">
                                <div class="modal-header">
                                    <h5 class="modal-title">Checkout</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <b><p class="fs-6 ms-4 mb-2" id="nama_paket">Paket: </p></b>
                                    <b><p class="fs-6 ms-4 mb-2" id="jumlah_paket1">Jumlah Paket: </p></b>
                                    <b><p class="fs-6 ms-4 mb-2" id="total_harga1">Total Harga: Rp </p></b>
                                    <p class="fs-4 text-center m-3"><b>Lakukan pembayaran terlebih dahulu</b></p>
                                    <div class="row mx-2">
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label fw-bold">Metode Pembayaran Tujuan</label>
                                            <select name="pembayaran_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px" required>
                                                <option selected hidden>Pilih Metode Pembayaran</option>
                                                @foreach ($pembayaran as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nama_metode }} - {{ $p->rek_tujuan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label fw-bold">Metode Pembayaran Anda</label>
                                            <select name="metode_asal" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px" required>
                                                <option selected hidden>Pilih Metode Pembayaran</option>
                                                @foreach ($pembayaran as $p)
                                                    <option value="{{ $p->nama_metode }}">{{ $p->nama_metode }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label fw-bold">Nomer Rekening/No E-wallet</label>
                                            <input type="text" name="rek_asal" id="rek_asal" class="form-control shadow-none" placeholder="masukkan no rek/no e-wallet Anda" required>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label fw-bold">Bukti Pembayaran</label>
                                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control shadow-none" accept="image/*" required>
                                        </div>
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                        <input type="hidden" name="total_harga" id="total_harga_hidden">
                                        <input type="hidden" name="paket_id" id="paket_id_hidden">
                                        <input type="hidden" name="jumlah_paket" id="jumlah_paket_hidden">
                                        <input type="hidden" name="status" value="Proses">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Iya</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </section>

    </main>

    @include('template.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>


    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][data-jumlah-paket]');
    const selectAllCheckbox = document.querySelector('input[type="checkbox"][id="select_all"]');
    const jumlahPaketElement = document.getElementById('jumlah_paket');
    const totalHargaElement = document.getElementById('total_harga');
    const jumlahPaketElement1 = document.getElementById('jumlah_paket1');
    const totalHargaElement1 = document.getElementById('total_harga1');
    const namaPaketElement = document.getElementById('nama_paket');


    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotals);
    });

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateTotals();
        });
    }

    function updateTotals() {
        let totalPaket = 0;
        let totalHarga = 0;
        let paketNames = [];

        checkboxes.forEach((checkbox, index) => {
            if (checkbox.checked) {
                const jumlahPaket = parseInt(checkbox.dataset.jumlahPaket);
                const harga = parseInt(checkbox.dataset.harga);
                const namaPaket = checkbox.dataset.namaPaket;

                totalPaket += jumlahPaket;
                totalHarga += harga;
                paketNames.push(namaPaket);
            }
        });

        jumlahPaketElement.innerText = `Jumlah Paket: ${totalPaket}`;
        totalHargaElement.innerText = `Total Harga: Rp ${totalHarga.toLocaleString()}`;
        jumlahPaketElement1.innerText = `Jumlah Paket: ${totalPaket}`;
        totalHargaElement1.innerText = `Total Harga: Rp ${totalHarga.toLocaleString()}`;
        namaPaketElement.innerText = `Paket: ${paketNames.join(', ')}`;


        // Update hidden inputs for form submission
        document.querySelector('input[name="jumlah_paket"]').value = totalPaket;
        document.querySelector('input[name="total_harga"]').value = totalHarga;
        document.querySelector('input[name="paket_id"]').value = paketNames.join(', ');
    }
});

    </script>

</body>

</html>
