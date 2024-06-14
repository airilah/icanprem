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
                <h1 class="mb-2 mb-lg-0">Pemesanan</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Pemesanan</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="info text-start my-4">
                            <h3>Profil Saya</h3>
                            <br>
                            <div class="info-item d-flex">
                                <i class="bi bi-person-circle"></i>
                                <div>
                                    <h4>Nama:</h4>
                                    <p>{{auth()->user()->nama}}</p>
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>{{auth()->user()->email}}</p>
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>No WhatsApp:</h4>
                                    <p>{{auth()->user()->no_wa}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <form action="/beli" method="post">
                            @csrf
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                            <input type="hidden" value="{{ $paket->id }}" name="paket_id">
                            <div class="info my-4">
                                <div class="card-body position-relative">
                                    <h4 class="header-title mb-3">
                                        <i class="mdi mdi-numeric-2-circle-outline text-primary"></i>
                                        <b>Paket yang di pilih:</b>
                                    </h4>
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/'. $paket->produk->gambar1) }}" alt="" width="200px" class="mx-3 my-3">
                                        <div class="text-start align-self-center">
                                            <h3 class="fs-1"><b>{{ $paket->nama_paket }}</h3></b>
                                            <h3 class="fs-2">Rp {{ $paket->harga }}</h3>
                                            <h4><a href="#" data-bs-toggle="modal" data-bs-target="#catatan">Rules</a></h4>
                                            <div class="modal fade" id="catatan" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Rules</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @php
                                                                $catatan = explode(';', $paket->catatan);
                                                            @endphp
                                                            @foreach ($catatan as $desc)
                                                                <li style="list-style: none"><i class="bi bi-check-circle-fill"></i> {{ $desc }}</li>
                                                            @endforeach
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 id="stok" data-stok="{{ $paket->stok }}">Stok: {{ $paket->stok }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="header-title mt-2 mb-4">
                                        <i class="mdi mdi-numeric-3-circle-outline text-primary"></i>
                                        <b>Pemesanan:</b>
                                    </h4>
                                    <div class="row mx-2">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Jumlah Paket</label>
                                            <div class="d-flex justify-content-center">
                                                <div class="input-group justify-content-center" style="width: 100%">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-secondary" type="button" id="button-minus">-</button>
                                                    </div>
                                                    <input class="form-control text-center" id="jumlah_paket" name="jumlah_paket" min="1" step="1" value="1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button" id="button-plus">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="stok-warning" class="text-danger text-center mt-2" style="display: none;">
                                                <small>Melebihi Stok!!</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Harga</label>
                                            <input type="text" name="total_harga_display" id="total_harga_display" class="form-control shadow-none" required readonly>
                                            <input type="hidden" name="total_harga" id="total_harga" required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Metode Pembayaran Tujuan</label>
                                            <select name="pembayaran_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px" required>
                                                <option selected hidden>Pilih Metode Pembayaran</option>
                                                @foreach ($pembayaran as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nama_metode }} - {{ $p->rek_tujuan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Metode Pembayaran Anda</label>
                                            <select name="metode_asal" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px" required>
                                                <option selected hidden>Pilih Metode Pembayaran</option>
                                                @foreach ($pembayaran as $p)
                                                    <option value="{{ $p->nama_metode }}">{{ $p->nama_metode }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Nomer Rekening/No E-wallet</label>
                                            <input type="text" name="rek_asal" id="rek_asal" class="form-control shadow-none" placeholder="masukkan no rek/no e-wallet Anda" required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Bukti Pembayaran</label>
                                            <input type="file" name="bukti_pembayaran" id="site_title_inp" class="form-control shadow-none" accept="image/*" required>
                                        </div>
                                        <input type="hidden" name="status" value="Proses">
                                        <div class="d-flex justify-content-between mt-3">
                                            <a type="button" href="/" class="btn btn-secondary">Kembali</a>
                                            <div>
                                                <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#beli" class="btn btn-success" style="color: #fff">Beli Sekarang</a>
                                                <div class="modal fade" id="beli" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Pemesanan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah benar Anda ingin memesan Paket ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                <button type="submit" class="btn btn-primary">Iya</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahPaketInput = document.getElementById('jumlah_paket');
            const totalHargaInput = document.getElementById('total_harga');
            const totalHargaDisplay = document.getElementById('total_harga_display');
            const hargaPaket = {{ $paket->harga }}; // Ambil harga paket dari variabel PHP
            const stokWarning = document.getElementById('stok-warning');
            const stok = parseInt(document.getElementById('stok').dataset.stok);


            function updatePrice() {
                const jumlahPaket = parseInt(jumlahPaketInput.value) || 1;
                const totalHarga = hargaPaket * jumlahPaket;
                totalHargaInput.value = totalHarga; // Set nilai numerik tanpa format
                totalHargaDisplay.value = "Rp " + totalHarga.toLocaleString('id-ID'); // Format dengan "Rp" dan pemisah ribuan
            }

            document.getElementById('button-minus').addEventListener('click', function () {
                var currentValue = parseInt(jumlahPaketInput.value);
                if (currentValue > 1) {
                    jumlahPaketInput.value = currentValue - 1;
                    stokWarning.style.display = 'none';
                    updatePrice();
                }
            });

            document.getElementById('button-plus').addEventListener('click', function () {
                var currentValue = parseInt(jumlahPaketInput.value);
                if (currentValue < stok) {
                    jumlahPaketInput.value = currentValue + 1;
                    stokWarning.style.display = 'none';
                    updatePrice();
                } else {
                    stokWarning.style.display = 'block';
                }
            });

            jumlahPaketInput.addEventListener('input', function () {
                const jumlahPaket = parseInt(jumlahPaketInput.value) || 1;
                if (jumlahPaket > stok) {
                    stokWarning.style.display = 'block';
                } else {
                    stokWarning.style.display = 'none';
                    updatePrice();
                }
            });

            updatePrice();
        });
    </script>



</body>

</html>
