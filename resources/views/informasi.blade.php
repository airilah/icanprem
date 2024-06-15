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

        <section id="starter-section" class="starter-section section">
            <div class="container section-title" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="text-start">
                            <img src="{{ asset('assets/img/' . $produk->gambar1) }}" class="card-img-top  img-fluid mb-1 mt-3" style="border-radius: 1rem;" width="150">
                            <h1 class="text-center">{{ $produk->nama_produk }}</h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <form id="dynamicForm" method="post">
                            @csrf
                            @if (Auth::user())
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                            <input type="hidden" id="hidden_paket_id" name="paket_id">
                            @endif
                            <div class="info my-4">
                                <div class="card-body position-relative">
                                    <h4 class="header-title mb-3">
                                        <i class="mdi mdi-numeric-2-circle-outline text-primary"></i>
                                        <b>Pilih Paket:</b>
                                    </h4>
                                    <div class="row row-gutter ml-1">
                                        @foreach ($paket as $item)
                                        <div class="col-lg-4 col-6 mb-2 col-gutter">
                                            <div class="list-group shadow h-100">
                                                <input type="radio" id="product_{{ $item->id }}" name="nama_paket" data-catatan="{{ $item->catatan }}" data-stok="{{ $item->stok }}" data-harga="{{ $item->harga }}" required="" onclick="setDefaultNumber('{{ $item->stok }}', '{{ $item->id }}', '{{ $item->harga }}')">
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
                                    <h4 class="header-title my-3">
                                        <i class="mdi mdi-numeric-3-circle-outline text-primary"></i>
                                        <b>Rules Paket:</b>
                                    </h4>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-control" id="note" readonly="" style="height: auto; text-align: left;">
                                                <b><small class="text-danger">*Wajib dibaca supaya tidak salah saat membeli produk</small></b>
                                            </div>
                                            <div id="stok-and-jumlah" class="d-none">
                                                <div class="d-flex justify-content-between m-3">
                                                    <b>Stok: <span id="stok"></span></b>
                                                    <div class="input-group" style="width: 100px;">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-secondary" type="button" id="button-minus">-</button>
                                                        </div>
                                                        <input class="form-control text-center" id="jumlah_paket" name="jumlah_paket" min="1" step="1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button" id="button-plus">+</button>
                                                        </div>
                                                        <div id="stok-warning" class="text-danger" style="display: none;"><small>Melebihi Stok!!</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end d-none" id="price-container">
                                                <input type="text" id="harga" name="harga" value="" style="width: 150px" readonly>
                                            </div>
                                            <div class="d-flex justify-content-between mt-3">
                                                <a type="button" href="/" class="btn btn-secondary">Kembali</a>
                                                <div>
                                                    @if (Auth::user())
                                                    <button type="button" onclick="submitForm('/masuk_keranjang')" class="btn btn-success"><i class="bi bi-cart4 icon"></i> Masuk Keranjang</button>
                                                    <button type="button" onclick="submitForm('/beli_sekarang', true)" class="btn btn-info" style="color: #fff">Beli Sekarang</button>
                                                    @endif
                                                    @if (!Auth::user())
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" href="#" class="btn btn-success"><i class="bi bi-cart4 icon"></i> Masuk Keranjang</a>
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" href="#" class="btn btn-info" style="color: #fff">Beli Sekarang</a>
                                                    @endif
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
        document.getElementById('harga').setAttribute('data-harga', harga);
        document.getElementById('price-container').classList.remove('d-none');
        document.getElementById('hidden_paket_id').value = id;
    }

    function updatePrice() {
        var jumlah = document.getElementById('jumlah_paket').value;
        var baseHarga = document.getElementById('harga').getAttribute('data-harga');
        var totalHarga = jumlah * baseHarga;
        document.getElementById('harga').value = "Rp " + totalHarga.toLocaleString('id-ID', { maximumFractionDigits: 0 }).replace(/\./g, '');
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

    function submitForm(actionUrl, isGet = false) {
        const selectedPackage = document.querySelector('input[name="nama_paket"]:checked');
        if (selectedPackage) {
            const packageId = selectedPackage.id.split('_')[1];
            document.getElementById('hidden_paket_id').value = packageId;
            console.log('Package ID:', packageId);

            if (isGet) {
                const finalUrl = actionUrl.endsWith('/') ? actionUrl + packageId : actionUrl + '/' + packageId;
                console.log('Final URL:', finalUrl);
                window.location.href = finalUrl;
            } else {
                var form = document.getElementById('dynamicForm');
                form.action = actionUrl;
                form.submit();
            }
        } else {
            alert('Pilih paket terlebih dahulu.');
        }
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
