<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKP-RI Kab. Bangkalan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Add this to your head section -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Navbar  -->
    @include('template.nav')

    <!-- Modal  Login-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--black);" data-bs-theme="dark">
            <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">
                <img src="{{ asset('assets/img/normal_koperasi.png') }}" alt="Logo" width="36" height="36"
                    class="d-inline-block align-text-top">
                    Login
                </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput" placeholder="nama@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword1">
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

    <!-- Modal  Daftar-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--black);" data-bs-theme="dark">
            <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">
                <img src="{{ asset('assets/img/normal_koperasi.png') }}" alt="Logo" width="36" height="36"
                    class="d-inline-block align-text-top">
                    Daftar
                </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Isi nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Isi alamat anda">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="tel" class="form-control" id="no_hp" placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nama@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info rounded">Daftar</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Content -->
    <section class="container-fluid">
        <div class="container mx-auto mt-3 p-5 bg-white shadow-lg">
            <h5 class="fw-semibold">Pilih Paket Sewa Gedung :</h5>
            <form action="" method="post" class="d-flex flex-wrap justify-content-between">
                <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text btn btn-success" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-list-task" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z" />
                                <path
                                    d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z" />
                                <path fill-rule="evenodd"
                                    d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z" />
                            </svg>
                        </span>
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Pilih Paket Sewa</option>
                            <option value="1">Seminar</option>
                            <option value="2">Rapat</option>
                            <option value="3">Diklat</option>
                            <option value="4">Wisuda</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text btn btn-success" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                              </svg>
                        </span>
                        <select class="form-select" id="inputGroupSelect02">
                            <option selected>Pilih Rentang Harga</option>
                            <option value="1">Rp. 1.000.000 keatas</option>
                            <option value="2">Rp. 2.000.000 kebawah</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group flex-nowrap">
                        <a class="btn btn-info form-control" href="#">Cari Sekarang</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="container">
        <div class="row my-5">
            @foreach ($paket as $item)
            @if($item->id == 5)
            <div class="col-lg-3 mb-3 mb-lg-0">
                <a class="card card-efek p-3 text-decoration-none"  href="/informasi/{{ $item->id }}">
                    <img src="{{ asset('assets/img/aula2-2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">{{ $item->nama_aula }}</h5>
                        <p class="card-text m-0">{{ $item->nama_acara}}</p>
                        <p class="card-text m-0">{{ $item->kursi }}</p>
                        <h5 class="card-title mt-3 fw-bold text-end">Rp {{ $item->harga }}</h5>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    @include('template.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
    <!-- Add these scripts before the closing body tag -->

</body>

</html>
