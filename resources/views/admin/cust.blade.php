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
                    <li class="breadcrumb-item active">Akun Customer</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>No WhatsApp</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($cust as $item)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->no_wa }}</td>
                                            <td>{{ $item->email }}</td>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        document.getElementById('rooms-setting').addEventListener('submit', function(event) {
            var isValid = true;

            // Validasi no_wa
            var noWa = document.getElementById('no_wa').value;
            var noWaFeedback = document.getElementById('no_wa_feedback');
            if (!noWa.startsWith('62') || noWa.length < 10 || noWa.length > 15) {
                noWaFeedback.textContent = 'Nomor WA harus dimulai dengan 62 dan berjumlah antara 10 hingga 15 karakter.';
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
                emailFeedback.textContent = 'Email harus mengandung karakter @.';
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
