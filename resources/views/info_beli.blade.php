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
                <h1 class="mb-2 mb-lg-0">Informasi Pembelian</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Informasi Pembelian</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">

            <!-- Section Title -->
            <section class="container-fluid">
                <div class="container mx-auto mt-3 py-1">
                    <div class="container p-0">
                        <div class="row g-0 mb-5">
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ffffff" class="bi bi-person-plus-fill bg-primary rounded-circle p-1" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </div>
                            <div class="col-11">
                                <div class="container">
                                    <p class="fw-bold mt-0" style="font-size: 20px;">Mendaftarkan Diri</p>
                                    <p class="mt-4">Untuk melakukan pemesanan di I Can Premium, Anda harus mendaftar terlebih dahulu.</p>
                                    <a class="btn btn-info nav-item" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="#">Daftar</a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 mb-5">
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ffffff" class="bi bi-lock-fill bg-warning rounded-circle p-1" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                                  </svg>
                            </div>
                            <div class="col-11">
                                <div class="container">
                                    <p class="fw-bold mt-0" style="font-size: 20px;">Login sebagai anggota</p>
                                    <p class="mt-4">Setelah mendaftar, selanjutnya kalian login terlebih dahulu agar kalian dapat melakukan transaksi atau pemesanan akun premium di I Can Premium.</p>
                                    <a class="btn btn-info rounded px-3" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="#">Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 mb-5">
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ffffff" class="bi bi-house-add-fill bg-danger rounded-circle p-1" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                                    <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                                </svg>
                            </div>
                            <div class="col-11">
                                <div class="container">
                                    <p class="fw-bold mt-0" style="font-size: 20px;">Pesan Paket mana yang inginkan!</p>
                                    <p class="mt-4">Sebelum memilih paket silahkan milih Aplikasi apa terlebih dahulu, kemudian pilih paket mana dan atur mau pesan berapa akun, lalu pilih ingin masuk keranjang atau beli sekarang.</p>
                                    <a class="btn btn-info rounded px-3"  href="/">Pesan</a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 mb-5">
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ffffff" class="bi bi-card-checklist bg-info rounded-circle p-1" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                                  </svg>
                            </div>
                            <div class="col-11">
                                <div class="container">
                                    <p class="fw-bold mt-0" style="font-size: 20px;">Form Beli Sekarang!</p>
                                    <p class="mt-4">setelah memilih beli sekarang, selanjutnya Anda akan di arahkan untuk mengisi form pemesanan untuk kelengkapan pembayaran dan pengiriman akun premiumnya. Setelah klik kirim, tunggu berapa menit untuk proses pemesanan tersebut yang nantinya akan di kirim melalui Nomer WhatApp kalian.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
            const radioButtons = document.querySelectorAll('input[name="nama_paket"]');
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

        function setDefaultNumber(stok, id, harga) {
            document.getElementById('jumlah_paket').value = 1;
            document.getElementById('stok').innerText = stok;
            document.getElementById('stok-and-jumlah').classList.remove('d-none');
            document.getElementById('stok-warning').style.display = 'none';
            document.getElementById('harga').value = "Rp " + harga;
            document.getElementById('harga').setAttribute('data-harga', harga);  // Set the base price

            document.getElementById('price-container').classList.remove('d-none');

            // Update the hidden input field with the selected package id
            document.getElementById('hidden_paket_id').value = id;
        }

        function updatePrice() {
            var jumlah = document.getElementById('jumlah_paket').value;
            var baseHarga = document.getElementById('harga').getAttribute('data-harga');
            var totalHarga = jumlah * baseHarga;
            document.getElementById('harga').value = "Rp " + totalHarga.toLocaleString('id-ID');
        }

        document.getElementById('button-minus').addEventListener('click', function () {
            var jumlahInput = document.getElementById('jumlah_paket');
            var currentValue = parseInt(jumlahInput.value);
            if (currentValue > 1) {
                jumlahInput.value = currentValue - 1;
                document.getElementById('stok-warning').style.display = 'none';
                updatePrice();
            }
        });

        document.getElementById('button-plus').addEventListener('click', function () {
            var jumlahInput = document.getElementById('jumlah_paket');
            var currentValue = parseInt(jumlahInput.value);
            var maxstok = parseInt(document.getElementById('stok').innerText);
            if (currentValue < maxstok) {
                jumlahInput.value = currentValue + 1;
                document.getElementById('stok-warning').style.display = 'none';
                updatePrice();
            } else {
                document.getElementById('stok-warning').style.display = 'block';
            }
        });

        document.getElementById('jumlah_paket').addEventListener('input', function () {
            var jumlahInput = document.getElementById('jumlah_paket');
            var currentValue = parseInt(jumlahInput.value);
            if (currentValue < 1) {
                jumlahInput.value = 1;
            }
            var maxstok = parseInt(document.getElementById('stok').innerText);
            if (currentValue > maxstok) {
                document.getElementById('stok-warning').style.display = 'block';
            } else {
                document.getElementById('stok-warning').style.display = 'none';
                updatePrice();
            }
        });

        function submitForm(actionUrl) {
            var form = document.getElementById('dynamicForm');
            form.action = actionUrl;
            form.submit();
        }

        document.addEventListener('DOMContentLoaded', () => {
            const radioButtons = document.querySelectorAll('input[type="radio"][name="nama_paket"]');
            radioButtons.forEach(button => {
                button.addEventListener('click', function() {
                    setDefaultNumber(this.getAttribute('data-stok'), this.id.split('_')[1], this.getAttribute('data-harga'));
                });
            });
        });
    </script>

</body>

</html>
