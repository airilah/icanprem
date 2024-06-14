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
                    <li class="breadcrumb-item active">Profile Saya</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            @if (session()->has('edit_akun'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('edit_akun') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <h5 class="card-title">Profil Saya</h5>
                            </div>
                            <form action="/edit_admin" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-body">
                                        @foreach ($user as $item)
                                            @if ($item->id == auth()->user()->id)
                                                <div class="row">
                                                    <input type="hidden" name="id"
                                                        value="{{ $item->id }}">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label fw-bold" for="nama"> Nama
                                                        </label>
                                                        <input type="text" id="nama" name="nama"
                                                            class="form-control shadow-none"
                                                            value="{{ $item->nama }}" required>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label fw-bold" for="email"> E-mail
                                                        </label>
                                                        <input type="text" id="email" name="email"
                                                            class="form-control shadow-none"
                                                            value="{{ $item->email }}" required>
                                                        <span id="error_email" style="color: red;"></span>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label fw-bold"> Nomer WhatsApp </label>
                                                        <input type="text" id="no_wa" name="no_wa"
                                                            class="form-control shadow-none"
                                                            value="{{ $item->no_wa }}" required>
                                                        <span id="error_no_wa" style="color: red;"></span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button id="submitButton" name="kirim"
                                            class="btn btn-outline-dark w-175 shadow-none" disabled>Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>

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
    <script src="{{ asset('assets/js/main_admin.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var inputFields = document.querySelectorAll('.form-control');
            var profileImage = document.getElementById('profileImage');
            var submitButton = document.getElementById('submitButton');
            var showPasswordCheckbox = document.getElementById('showPassword');
            var passwordInput = document.getElementById('password');

            // Simpan nilai awal input dalam array
            const previousValues = Array.from(inputFields, inputField => inputField.value);
            const originalImageSrc = profileImage ? profileImage.src : null;

            // Tambahkan event listener untuk menangani perubahan pada input fields
            inputFields.forEach((inputField, index) => {
                inputField.addEventListener('input', checkSubmitButtonStatus);
            });

            // Tambahkan event listener untuk menangani perubahan pada gambar
            if (profileImage) {
                profileImage.addEventListener('change', checkSubmitButtonStatus);
            }

            // Tambahkan event listener untuk menangani perubahan pada checkbox "Tampilkan Password"
            showPasswordCheckbox.addEventListener('change', function () {
                if (showPasswordCheckbox.checked) {
                    passwordInput.setAttribute('type', 'text');
                } else {
                    passwordInput.setAttribute('type', 'password');
                }
            });

            function checkSubmitButtonStatus() {
                let inputChanged = false;
                let imageChanged = false;

                inputFields.forEach((inputField, index) => {
                    if (inputField.value.trim() !== '' && inputField.value !== previousValues[index]) {
                        inputChanged = true;
                    }
                });

                if (profileImage && profileImage.src !== originalImageSrc) {
                    imageChanged = true;
                }

                if (inputChanged || imageChanged) {
                    // Aktifkan tombol jika ada perubahan pada input atau gambar
                    submitButton.removeAttribute('disabled');
                } else {
                    // Nonaktifkan tombol jika tidak ada perubahan
                    submitButton.setAttribute('disabled', 'true');
                }
            }
        });
    </script>

    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            var telepon = document.getElementById('no_wa').value;
            var email = document.getElementById('email').value;

            var teleponValid = /^\d{10,15}$/;  // Validasi nomor telepon (10-15 digit)
            var emailValid = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;  // Validasi alamat email

            var error_no_wa = document.getElementById('error_no_wa');
            var errorEmail = document.getElementById('error_email');

            // Reset pesan error sebelum memvalidasi lagi
            error_no_wa.textContent = "";
            errorEmail.textContent = "";

            if (!teleponValid.test(telepon)) {
                error_no_wa.textContent = "Nomor telepon harus terdiri dari 10 hingga 15 digit.";
                e.preventDefault(); // Menghentikan pengiriman form
            }

            if (!emailValid.test(email)) {
                errorEmail.textContent = "Alamat email tidak valid.";
                e.preventDefault(); // Menghentikan pengiriman form
            }
        });
    </script>

</body>

</html>
