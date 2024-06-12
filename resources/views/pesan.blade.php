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
                <h1 class="mb-2 mb-lg-0">Paket</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">{{ $produk->nama_produk }}</li>
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
                        <div class="text-start">
                            <img src="{{ asset('assets/img/' . $produk->gambar) }}" class="card-img-top  img-fluid mb-1 mt-3" style="border-radius: 1rem;" width="150">
                            <h1 class="text-center">{{ $produk->nama_produk }}</h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body position-relative">
                                <h4 class="header-title mb-3">
                                    <i class="mdi mdi-numeric-2-circle-outline text-primary"></i>
                                    <b>Pilih Paket:</b>
                                </h4>
                                <div class="row row-gutter ml-1">
                                    @foreach ($paket as $item)
                                    <div class="col-lg-4 col-6 mb-2 col-gutter">
                                        <div class="list-group shadow h-100">
                                            <input type="radio" id="product_{{ $item->id }}" name="product" data-catatan="{{ $item->catatan }}" required="">
                                            <label for="product_{{ $item->id }}" class="list-group-item h-100 py-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col product-name-form">{{ $item->nama_paket }}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col nominal-price">Rp {{ $item->harga }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="header-title mb-3">
                                    <i class="mdi mdi-numeric-3-circle-outline text-primary"></i>
                                    <b>Catatan Produk</b>
                                </h4>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="form-control" id="note" readonly="" style="height: auto; text-align: left;">
                                            <b><small class="text-danger">*Wajib dibaca supaya tidak salah saat membeli produk</small></b>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button type="button" class="btn btn-secondary">Kembali</button>
                                            <div>
                                                <button type="button" class="btn btn-success"><i class="bi bi-cart4 icon"></i> Masuk Keranjang</button>
                                                <button type="button" class="btn btn-info" style="color: #fff" >Beli Sekarang</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const radioButtons = document.querySelectorAll('input[name="product"]');
        const noteDiv = document.getElementById('note');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', function () {
                const catatan = this.getAttribute('data-catatan');
                const catatanLines = catatan.split('\n');
                let resultHtml = '';

                catatanLines.forEach(line => {
                    const catatanArray = line.split(';');
                    resultHtml += '<ul>' + catatanArray.map(cttn => `<li style="list-style: none; text-align: left;">- ${cttn}</li>`).join('') + '</ul>';
                });

                noteDiv.innerHTML = resultHtml;
            });
        });
    });


    </script>

</body>

</html>
