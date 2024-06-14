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
                                <div class="col-12 col-md-5">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/' . $item->paket->produk['gambar1']) }}" class="card-img-top mx-2" style="width: 80px">
                                        <div class="text-start align-self-center">
                                            <p class="fs-4"><b>{{ $item->paket['nama_paket'] }}</b></p>
                                            <p><a href="#" data-bs-toggle="modal" data-bs-target="#catatan{{ $item->id  }}">Catatan</a></p>
                                            <div class="modal fade" id="catatan{{ $item->id  }}" tabindex="-1">
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
                                    <div class="alig-self-center">
                                       <p>Jumlah : {{$item->jumlah_paket}}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <h5 class="align-self-center">Harga: Rp {{ $item->harga }}</h5>
                                </div>
                                <div class="col-12 col-md-2">
                                    <a type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">Hapus</a>
                                    <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah benar Anda ingin menghapus Paket ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    @method('delete')
                                                    @csrf
                                                    <a type="button"  href="{{ route('hapus_keranjang', ['id' => $item->id]) }}" class="btn btn-primary">Iya</a>
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
                            <div class="col-md-3 fs-5">
                                <b><p id="total_produk" class="pe-4">Total Produk: {{ $total_produk }}</p></b>
                            </div>
                            <div class="col-md-3 fs-5">
                                <b><p id="total_harga">Total Harga: Rp {{ number_format($total_harga, 0, ',', '.') }}</p></b>
                            </div>
                            <div class="col-md-3 fs-5">
                                <a type="button" class="btn btn-info w-100" href="/#produk" style="color: white">Tambah lagi</a>
                            </div>
                            <div class="col-md-3 fs-5">
                                <a type="button" class="btn btn-success w-100" href="#" data-bs-toggle="modal" data-bs-target="#checkout{{ $item->id }}">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="checkout{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Checkout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah benar Anda ingin Checkout semua Paket ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <a href="/" type="button" class="btn btn-primary">Iya</a>
                            </div>
                        </div>
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


</body>

</html>
