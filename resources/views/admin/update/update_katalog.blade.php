<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Katalog</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Main Sidebar Container -->
    @include('admin.template.nav_admin')

  <!-- Content Wrapper. Contains page content -->
    @if (session()->has('tambah_user'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('tambah_user') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Katalog</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="card">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Katalog Settings</p>
                </div>
                <div class="card-body">
                    <form action="update_katalog" id="rooms-setting" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{$katalog->id}}"> --}}
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_pengajuan"><strong>Aula</strong></label>
                                    <select name="aula_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                        @foreach ($aula as $p)
                                            <option value="{{ $p->id }}"{{ ($katalog && $katalog->aula && $katalog->aula->id == $p->id) ? 'selected' : '' }}>{{ $p->nama_aula }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="kategori"><strong>Kategori</strong></label>
                                    <input class="form-control" type="text" id="kategori" value="{{$katalog->kategori}}" name="kategori">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_paket"><strong>Paket</strong></label>
                                    <input class="form-control" type="text" id="nama_paket" value="{{$katalog->nama_paket}}" name="nama_paket">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_acara"><strong>Nama Acara</strong></label>
                                    <input class="form-control" type="text" id="nama_acara" value="{{$katalog->nama_acara}}" name="nama_acara">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="harga"><strong>harga</strong></label>
                                    <input class="form-control" type="number" id="harga" value="{{$katalog->harga}}" name="harga">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="kursi"><strong>Kursi</strong></label>
                                    <input class="form-control" type="number" id="kursi" value="{{$katalog->kursi}}" name="kursi">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="mic"><strong>Mic</strong></label>
                                    <input class="form-control" type="number" id="mic" value="{{$katalog->mic}}" name="mic">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="lama_sewa"><strong>Lama Sewa</strong></label>
                                    <input class="form-control" type="number" id="lama_sewa" value="{{$katalog->lama_sewa}}" name="lama_sewa">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="fasilitas"><strong>Fasilitas</strong></label>
                                    <input class="form-control" type="text" id="fasilitas" value="{{$katalog->fasilitas}}" name="fasilitas">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label" for="gambar"><strong>Gambar</strong></label>
                                    <input class="form-control" type="file" id="gambar" name="gambar" value="{{$katalog->gambar}}">
                                    <label>Foto Saat Ini</label>
                                    <br>
                                    <img src="{{ asset('assets/img/'.$katalog->gambar) }}" alt="gambar saat ini" width="100px">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="modal-footer">
                                <button id="submitButton" name="kirim" class="btn btn-outline-dark w-175 shadow-none">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.template.footer_admin')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        // Tambahkan script jQuery atau JavaScript di sini
        $(document).ready(function () {
            $('.read-more-btn').on('click', function () {
                var facilitiesCell = $(this).closest('.facilities-cell');
                facilitiesCell.find('.short-facilities').toggle();
                facilitiesCell.find('.full-facilities').toggle();
            });
        });
    </script>
</body>
