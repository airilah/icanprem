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
                    <li class="breadcrumb-item">Komponen</li>
                    <li class="breadcrumb-item active">Slider</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('tambah_slider'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('tambah_slider') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('delete_slider'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('delete_slider') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('edit_slider'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('edit_slider') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <h5 class="card-title">Daftar Slider</h5>
                                <div class="card-tools my-3">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_slider">
                                        <i class="bi bi-plus-square"></i> Tambah Slider
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="tambah_slider" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="/tambah_slider" id="rooms-setting" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Slider</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label fw-bold">Nama Slider</label>
                                                    <input type="text" name="nama_slider" id="site_title_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label fw-bold">Gambar Slider</label>
                                                    <input type="file" name="gambar_slider" id="site_title_inp" class="form-control shadow-none" accept="image/*" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Slider</th>
                                        <th>Gambar Slider</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($slider as $item)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $item->nama_slider }}</td>
                                            <td>
                                                <img src="{{ asset('assets/img/'.$item->gambar_slider) }}" style="width: 130px" >
                                            </td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#edit_slider{{ $item->id }}" >
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <!-- Modal edit -->
                                                <div class="modal fade" id="edit_slider{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <form action="{{ route('edit_slider', ['id' => $item->id]) }}" id="rooms-setting" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Slider</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <label class="form-label fw-bold">Nama Slider</label>
                                                                            <input type="text" name="nama_slider" id="site_title_inp" class="form-control shadow-none" value="{{ $item->nama_slider }}">
                                                                        </div>
                                                                        <div class="col-xl-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold" for="gambar_slider"><strong>Gambar Slider</strong></label>
                                                                                <input class="form-control" type="file" id="gambar_slider" name="gambar_slider">
                                                                                <label>Foto Saat Ini</label>
                                                                                <br>
                                                                                <img src="{{ asset('assets/img/'.$item->gambar_slider) }}" alt="gambar_slider saat ini" width="100px">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                                                    <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                               <!-- Modal hapus -->
                                                <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah benar Anda ingin menghapus slider ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                @method('delete')
                                                                @csrf
                                                                <a type="button"  href="{{ route('delete_slider', ['id' => $item->id]) }}" class="btn btn-primary">Iya</a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Tambahkan script jQuery atau JavaScript di sini
        $(document).ready(function () {
            console.log('Document is ready');
            $('.read-more-btn').on('click', function () {
                console.log('Button clicked');
                var deskripsiCell = $(this).closest('.deskripsi-cell');
                var shortdeskripsi = deskripsiCell.find('.short-deskripsi');
                var fulldeskripsi = deskripsiCell.find('.full-deskripsi');
                var isExpanded = fulldeskripsi.is(':visible');

                console.log('isExpanded:', isExpanded);

                shortdeskripsi.toggle();
                fulldeskripsi.toggle();

                $(this).text(isExpanded ? 'Read More' : 'Read Less');
            });
        });
    </script>

</body>

</html>
