<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.head_admin')
</head>

<body>

    <!-- ======= Header ======= -->
    <!-- ======= Sidebar ======= -->
    @include('admin.template.nav_admin')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>I Can Premium</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Profil</li>
                    <li class="breadcrumb-item active">Akun Admin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('tambah_akun'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('tambah_akun') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('delete_akun'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('delete_akun') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('edit_akun'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('edit_akun') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <h5 class="card-title">Daftar Akun Admin</h5>
                                <div class="card-tools my-3">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_admin">
                                        <i class="bi bi-plus-square"></i> Tambah Akun Admin
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="tambah_admin" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="/tambah_admin" id="rooms-setting" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Admin</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Nama Admin</label>
                                                        <input type="text" name="nama" id="nama" class="form-control shadow-none" placeholder="Isi nama anda" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">No Wa</label>
                                                        <input type="text" name="no_wa" id="no_wa" class="form-control shadow-none" placeholder="628xxxxxxxxxx" required>
                                                        <div class="invalid-feedback" id="no_wa_feedback"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Email</label>
                                                        <input type="text" name="email" id="email" class="form-control shadow-none" placeholder="nama@gmail.com" required>
                                                        <div class="invalid-feedback" id="email_feedback"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Password</label>
                                                        <input type="password" name="password" class="form-control shadow-none" required>
                                                    </div>
                                                    <input hidden type="text" name="role" id="nama" class="form-control shadow-none" value="admin" >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                    <style>
                                        .invalid-feedback {
                                            display: none;
                                            color: red;
                                            font-size: 0.875em;
                                        }
                                    </style>

                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Admin</th>
                                        <th>No WhatsApp</th>
                                        <th>Email</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($admin as $item)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->no_wa }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah benar Anda ingin menghapus Akun ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                @method('delete')
                                                                @csrf
                                                                <a type="button"  href="{{ route('delete_akun', ['id' => $item->id]) }}" class="btn btn-primary">Iya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('admin.template.footer_admin')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main_admin.js') }}"></script>

    <script>
        document.getElementById('rooms-setting').addEventListener('submit', function(event) {
            var isValid = true;

            // Validasi no_wa
            var noWa = document.getElementById('no_wa').value;
            var noWaFeedback = document.getElementById('no_wa_feedback');
            if (!noWa.startsWith('62') || noWa.length < 10 || noWa.length > 15) {
                noWaFeedback.textContent = 'Harus dimulai dengan 62 dan berjumlah 10-15 karakter.';
                noWaFeedback.style.display = 'block';
                isValid = false;
            } else {
                noWaFeedback.textContent = '';
                noWaFeedback.style.display = 'none';
            }

            // Validasi email
            var email = document.getElementById('email').value;
            var emailFeedback = document.getElementById('email_feedback');
            if (!email.includes('@')) {
                emailFeedback.textContent = 'Harus mengandung karakter @.';
                emailFeedback.style.display = 'block';
                isValid = false;
            } else {
                emailFeedback.textContent = '';
                emailFeedback.style.display = 'none';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>

</body>

</html>
