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
                <h1 class="mb-2 mb-lg-0">Riwayat Pemesanan</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Riwayat Pemesanan</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">


            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                @if (session()->has('tambah_pemesanan'))
                    <div class="alert alert-info alert-dismissible fade show text-start" role="alert">
                        {{ session('tambah_pemesanan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('delete_pemesanan'))
                    <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
                        {{ session('delete_pemesanan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @foreach ($pesan as $item)
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-5">
                                    <p class="fs-3"><b>Nama Paket</b></p>
                                    <hr>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center" style="height: 100px">
                                        <img src="{{ asset('assets/img/' . $item->paket->produk['gambar1']) }}"
                                            class="card-img-top mx-2" style="width: 100px">
                                        </div>
                                        <div class="text-start align-self-center">
                                            <p class="fs-4"><b>{{ $item->paket['nama_paket'] }}</b></p>
                                            <p class="fs-5">{{ $item->jumlah_paket }} Paket - Rp {{ $item->total_harga }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <p class="fs-3"><b>Pembayaran</b></p>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <div class="align-self-center text-center">
                                            <p><b>Asal: </b></p>
                                            <p>{{ $item->pembayaran->nama_metode }} - {{ $item->pembayaran->rek_tujuan }}</p>
                                            <p><b>Tujuan: </b></p>
                                            <p>{{ $item->metode_asal }} - {{ $item->rek_asal }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <p class="fs-3"><b>Bayar</b></p>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <div class="align-self-center text-center">
                                            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0"
                                                data-bs-toggle="modal" data-bs-target="#lihat-gambar-{{ $item->id }}"><b>Bukti</b>
                                            </a>
                                            <div class="modal fade" id="lihat-gambar-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content" style="background-color: transparent; border:0;">
                                                        <div class="modal-header" style="border-bottom:0;">
                                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-0 d-flex justify-content-center">
                                                            <img src="{{ asset('assets/img/upload/'.$item->bukti_pembayaran) }}" alt="{{ $item->bukti_pembayaran }}" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><b>Tanggal Beli:</b></p>
                                            <p>{{ $item->created_at }}</p>
                                            <p>Status:
                                                <b><span style="color:
                                                @if($item->status == 'Proses')
                                                    red
                                                @elseif($item->status == 'Terkirim')
                                                    green
                                                @else
                                                    black
                                                @endif;">
                                                {{ $item->status }}
                                            </span></b></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-2">
                                    <p class="fs-3"><b>Aksi</b></p>
                                    <hr>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="align-self-center text-center">
                                            @if($item->status != 'Terkirim')
                                                <a type="button" class="btn btn-danger mx-4 my-2" href="#" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">Batalkan</a>
                                                <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah benar Anda ingin batalkan pemesanan ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                @method('delete')
                                                                @csrf
                                                                <a type="button"  href="{{ route('batal_pemesanan', ['id' => $item->id]) }}" class="btn btn-primary">Iya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->status == 'Terkirim')
                                                <a type="button" class="btn btn-info mx-4 my-2" href="/#contact" style="color: white">Garansi</a>
                                            @endif
                                            <a type="button" class="btn btn-success" href="/#produk">Beli lagi</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
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
