<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body class="index-page">

    @include('template.nav')

    <main class="main">
        @if (session()->has('tambah_user'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('tambah_user') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container-fluid">
                <div class="portfolio-details-slider swiper">
                    <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "navigation": {
                      "nextEl": ".swiper-button-next",
                      "prevEl": ".swiper-button-prev"
                    },
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    }
                  }
                </script>
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($slider as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/img/' . $item->gambar_slider) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section>
        <section id="about" class="featured-services section">
            <div class="container">
                <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" style="margin-bottom: 30px" data-aos="zoom-out">
                    <img src="{{ asset('assets/img/logo.jpg') }}" class="img-fluid animated" width="200px">
                    <h1>Selamat Datang di <span>I Can Premium</span></h1>
                    <p>Mulailah Nonton Film, Dengarkan Musik, dan Editing Tanpa Batas</p>
                    <div class="d-flex">
                        <a href="#produk" class="btn-get-started scrollto">PESAN</a>
                    </div>
                </div>

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-cart4 icon"></i></div>
                            <h4><a href="" class="stretched-link">Transaksi</a></h4>
                            <p>Telah melakukan transaksi sebanyak {{$pesan}}</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-person-square icon"></i></div>
                            <h4><a href="" class="stretched-link">Pelanggan</a></h4>
                            <p>Website ini telah memilki pelanggan sebanyak {{$customer}}</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-bag-heart icon"></i></div>
                            <h4><a href="" class="stretched-link">Testimoni</a></h4>
                            <p>Terpecaya, proses cepat dan bergaransi </p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-cash icon"></i></div>
                            <h4><a href="" class="stretched-link">Harga Murah</a></h4>
                            <p>Harga lebih murah dari Anda beli di Aplikasinya langsung</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <section id="produk" class="features section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Semua Produk</h2>
                <p>Produk Akun Premium yang kami tawarkan kepada Anda:</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up">
                <ul class="nav nav-tabs row gy-4 d-flex">
                    @foreach ($produk as $item)
                        <li class="nav-item col-6 col-md-4 col-lg-2">
                            <a class="nav-link @if($item->id == 1) active show @endif" data-bs-toggle="tab"
                                data-bs-target="#features-tab-{{ $item->id }}">
                                <img src="{{ asset('assets/img/' . $item->gambar1) }}" alt=""
                                    style="width: 100px">
                                <h4>{{ $item->nama_produk }}</h4>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($produk as $item)
                    <div class="tab-pane fade @if($item->id == 1) active show @endif" id="features-tab-{{ $item->id }}">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>{{ $item->nama_produk }}</h3>
                                <p class="fst-italic">
                                    Dengan membeli paket premium pada aplikasi {{ $item->nama_produk }} kalian
                                    akan mendapatkan manfaat seperti berikut:
                                </p>
                                <ul>
                                    @php
                                        $deskripsi = explode(';', $item->deskripsi);
                                    @endphp
                                    @foreach ($deskripsi as $desc)
                                        <li style="list-style: none"><i class="bi bi-check-circle-fill"></i> {{ $desc }}</li>
                                    @endforeach
                                </ul>
                                <p>
                                    Berikut {{ $item->nama_produk }} paket yang kami tawarkan:
                                </p>
                                <a class="btn btn-info" href="{{ route('informasi', ['id' => $item->id]) }}">Paket {{ $item->nama_produk }}</a>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ asset('assets/img/' . $item->gambar2) }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>

        @if (Auth::user())
        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Garansi</h2>
                <p>Masukkan Akun Premium Anda ke dalam kolom di bawah ini:</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            <h3>Profil Saya</h3>
                            <br>
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Nama:</h4>
                                    <p>{{auth()->user()->nama}}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>{{auth()->user()->email}}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>No WhatsApp:</h4>
                                    <p>{{auth()->user()->no_wa}}</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label fw-bold">Paket</label>
                                    <select name="paket_id" id="paket_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                        <option selected hidden>Pilih Paket</option>
                                        @foreach ($paket as $p)
                                            <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label class="form-label fw-bold">Tanggal Pesan</label>
                                    <input type="date" class="form-control" name="tgl_pesan" id="tgl_pesan" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label fw-bold">Tanggal Garansi</label>
                                    <input type="date" class="form-control" name="tgl_garansi" id="tgl_garansi" value="" disabled>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label class="form-label fw-bold">Permasalahan</label>
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="password dari akun tersebut berubah" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label fw-bold">Kirim Akun Premium</label>
                                <textarea class="form-control" name="akun_premium" placeholder="
                                    NETFLIX SHARING 1P2U 1 Bulan
                                    WAJIB LOGOUT KETIKA TIDAK DIGUNAKAN
                                    📌Email : xxxxxxxxxxx
                                    📌pass : xxxxxxx
                                    📌profil : xxxxxx

                                    📝RULES :
                                    - 1 PROFIL 1 DEVICE, JANGAN LEBIH
                                    - JANGAN RUBAH PROFIL, PIN, DLL
                                    - DILARANG KERAS MENGGANTI PASSWORD
                                    - DILARANG KERAS PENCET CANCEL MEMBERSHIP
                                    - JANGAN CHANGE EMAIL, CHANGE = HANGUS
                                    - JANGAN UTAK ATIK AKUN
                                    - PAKAI PROFIL PUNYA SENDIRI, JANGAN PAKAI PUNYA ORANG LAIN
                                    MELANGGAR = HANGUS
                                    - LOGIN AKUN KETIKA DIGUNAKAN DAN LOGOUT KETIKA TIDAK DIGUNAKAN
                                    ERROR ? CLAIM GARANSI LANGSUNG CHAT SELLER" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->
        @endif

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
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var slideIndex = 1;
            showSlides(slideIndex);

            document.getElementById('prevButton').addEventListener('click', function() {
                plusSlides(-1);
            });

            document.getElementById('nextButton').addEventListener('click', function() {
                plusSlides(1);
            });

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("slide");
                if (n > slides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = slides.length;
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slideIndex - 1].style.display = "block";
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tglGaransiInput = document.getElementById('tgl_garansi');

            // Mendapatkan tanggal saat ini
            var today = new Date();
            var day = ("0" + today.getDate()).slice(-2);
            var month = ("0" + (today.getMonth() + 1)).slice(-2);
            var todayDate = today.getFullYear() + "-" + month + "-" + day;

            // Mengatur nilai input ke tanggal hari ini
            tglGaransiInput.value = todayDate;
        });
        </script>


</body>

</html>
