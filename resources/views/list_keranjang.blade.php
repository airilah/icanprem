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
                @foreach ($keranjang as $item)
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center"> <!-- Tambahkan class align-items-center di sini -->
                            <div class="col-12 col-md-5">
                                <div class="d-flex">
                                    <img src="{{ asset('assets/img/' . $item->paket->produk['gambar1']) }}" class="card-img-top" style="width: 80px">
                                    <div class="text-start align-self-center">
                                        <h4>{{ $item->paket['nama_paket'] }}</h4>
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
                                                                $catatan = explode("\n", $item->paket['catatan']); // Pisahkan berdasarkan baris baru
                                                            @endphp
                                                            @foreach ($catatan as $catat)
                                                                @if (strpos($catat, ';') !== false) {{-- Jika terdapat ; --}}
                                                                    @php
                                                                        $subCatatan = explode(';', $catat); // Pisahkan berdasarkan ;
                                                                    @endphp
                                                                    @foreach ($subCatatan as $subCat)
                                                                        <li> - </i> {!! nl2br(e($subCat)) !!}</li>
                                                                    @endforeach
                                                                @else {{-- Jika tidak terdapat ; --}}
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
                                <div class="alig-self-center"> <!-- Perbaiki typo di sini, harusnya align-self-center -->
                                    <div class="input-group" style="width: 100px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" id="button-minus">-</button>
                                        </div>
                                        <input class="form-control text-center" id="jumlah_paket" name="jumlah_paket" min="1" step="1" value="{{$item->jumlah_paket}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-plus">+</button>
                                        </div>
                                        <div id="stok-warning" class="text-danger" style="display: none;"><small>Melebihi Stok!!</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5 class="align-self-center">Harga: Rp {{ $item->harga }}</h5>
                            </div>
                            <div class="col-12 col-md-2">
                                <a href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        
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
