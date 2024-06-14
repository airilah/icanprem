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
                <h1 class="mb-2 mb-lg-0">Informasi Pembayaran</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Informasi Pembayaran</li>
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
                        <div class="row g-0">
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ffffff" class="bi bi-coin bg-success rounded-circle p-2" viewBox="0 0 16 16">
                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                                  </svg>
                            </div>
                            <div class="col-11">
                                <div class="container">
                                    <p class="fw-bold mt-0" style="font-size: 20px;">Pembayaran</p>
                                    <p class="mt-4">Untuk pembayaran pemesanan Akun Premium di I Can Premium melalui via transfer e-wallet, seperti berikut:</p>
                                    @foreach ($bayar as $item)
                                    <div class="d-flex my-3">
                                        <img class="mx-3" src="{{ asset('assets/img/' . $item->gambar) }}" alt="" style="width: 100px">
                                        <div class="text-start align-self-center">
                                            <h3 class="mb-2"><b>{{ $item->nama_metode }}</b></h3>
                                            <h6>Nomer E-wallet : <b>{{ $item->rek_tujuan }}</b></h6>
                                            <h6>Atas Nama : <b>{{ $item->an }}</b></h6>
                                        </div>
                                    </div>
                                    @endforeach
                                    <p class="mt-4" style="color: red">Noted: jika tidak melakukan pembayaran secara sah/penipuan maka pemesanan akun tidak akan di proses</p>
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
