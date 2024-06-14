<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0 mx-3">
            <h1 class="sitename">I CAN PREMIUM</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="">Home<br></a></li>
                <li><a href="/#about">Tentang</a></li>
                <li><a href="/#produk">Produk</a></li>
                @if (Auth::user())
                <li><a href="/#contact">Garansi</a></li>
                @endif
                <li><a href="/#footer">Kontak</a></li>
                <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @if (Auth::user())
                        <li><a href="/info_beli">Informasi Pembelian</a></li>
                        <li><a href="/info_bayar">Metode Pembayaran</a></li>
                        @else
                        <li><a href="/informasi_beli">Informasi Pembelian</a></li>
                        <li><a href="/informasi_bayar">Metode Pembayaran</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @if (!Auth::user())
        <div class="d-flex align-items-center">
            <a class="btn-getstarted mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal1" href="#">LOGIN</a>
        </div>
        @endif
        @if (Auth::check())
        <div class="d-flex align-items-center">
            <a href="/list_keranjang" class="icon mx-3 position-relative">
                <i class="bi bi-cart4 icon" style="font-size: 30px"></i>
                <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $keranjangCount }}</span>
            </a>
            <div class="nav-item dropdown">
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/profile/{{ auth()->user()->id }}/edit">Profil</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ubah-password" href="#">Ubah Password</a></li>
                    <li><a class="dropdown-item" href="/riwayat">Riwayat Pemesanan</a></li>
                    @if (auth()->user()->role == 'admin')
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tampilan Admin</a></li>
                    @endif
                </ul>
                <a class="nav-link fw-medium dropdown-toggle d-flex align-items-center mx-3" href="#" style="font-size: 1rem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="icon" style="font-size: 2rem;"><i class="bi bi-person-circle"></i></div>
                </a>
            </div>
            <a class="btn-getstarted mx-3" href="{{ route('logout') }}">LOGOUT</a>
        </div>
    @endif
</div>
</header>


<!-- Modal Ubah PW -->
@if (Auth::user())
    <div class="modal fade" id="ubah-password" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('ubah_pw', ['id' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Password</h5>
                    </div>
                    <div class="modal-body">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control shadow-none">
                    </div>
                    <div class="modal-body">
                        <label for="password_baru" class="form-label">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control shadow-none">
                    </div>
                    <div class="modal-body">
                        <label for="konfirmasi_password_baru" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password_baru" class="form-control shadow-none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success text-white shadow-none" name="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif


<!-- Modal Login -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--black);" data-bs-theme="dark">
                <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel" >
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" width="36" height="36" class="d-inline-block align-text-top">
                Login
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('login') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="nama@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <p>Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-dismiss="modal">Daftar</a></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info rounded">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Daftar -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--black);" data-bs-theme="dark">
                <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" width="36" height="36" class="d-inline-block align-text-top">
                    Daftar
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tambah_user') }}" method="post" id="rooms-setting">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Isi nama anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_wa" class="form-label">No HP</label>
                        <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="62xxxxxxxxxxx" required>
                        <div class="invalid-feedback d-none" id="no_wa_feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nama@gmail.com" required>
                        <div class="invalid-feedback d-none" id="email_feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword" required>
                    </div>
                    <input type="text" class="form-control" name="role" id="role" value="customer" hidden>
                    <div class="mb-3">
                        <p>Sudah punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-dismiss="modal">Login</a></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info rounded">Daftar</button>
                </div>
            </form>

            <style>
                .invalid-feedback {
                    display: block;
                    color: red;
                    font-size: 0.875em;
                }

                .d-none {
                    display: none;
                }
            </style>

        </div>
    </div>
</div>


<script>
    // Mengambil nilai jumlah item dari tabel keranjang dan menampilkannya di atas ikon keranjang
    function updateCartCount() {
        // Ambil nilai dari elemen span dengan id "cartCount" dan konversi ke integer
        var itemCount = parseInt(document.getElementById('cartCount').textContent);

        // Perbarui teks pada elemen span dengan id "cartCount"
        document.getElementById('cartCount').textContent = itemCount;
    }

    // Panggil fungsi updateCartCount() saat halaman dimuat
    window.onload = function() {
        updateCartCount(); // Perbarui jumlah item di atas ikon keranjang
    };
</script>

<script>
    document.getElementById('rooms-setting').addEventListener('submit', function(event) {
        var isValid = true;

        // Validasi no_wa
        var noWa = document.getElementById('no_wa').value;
        var noWaFeedback = document.getElementById('no_wa_feedback');
        if (!noWa.startsWith('62') || noWa.length < 10 || noWa.length > 15) {
            noWaFeedback.textContent = 'Harus dimulai dengan 62 dan berjumlah 10-15 karakter.';
            noWaFeedback.classList.remove('d-none');
            isValid = false;
        } else {
            noWaFeedback.textContent = '';
            noWaFeedback.classList.add('d-none');
        }

        // Validasi email
        var email = document.getElementById('email').value;
        var emailFeedback = document.getElementById('email_feedback');
        if (!email.includes('@')) {
            emailFeedback.textContent = 'Harus mengandung karakter @.';
            emailFeedback.classList.remove('d-none');
            isValid = false;
        } else {
            emailFeedback.textContent = '';
            emailFeedback.classList.add('d-none');
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

