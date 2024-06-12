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
                    <li class="breadcrumb-item">Katalog</li>
                    <li class="breadcrumb-item active">Keranjang</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('tambah_keranjang'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('tambah_keranjang') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('delete_keranjang'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('delete_keranjang') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('edit_keranjang'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('edit_keranjang') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <h5 class="card-title">Daftar Keranjang</h5>
                                <div class="card-tools my-3">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_keranjang">
                                        <i class="bi bi-plus-square"></i> Tambah Keranjang
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="tambah_keranjang" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="/tambah_keranjang" id="rooms-setting" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Tambah Keranjang</h5>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Nama Customer</label>
                                                <select name="user_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                  <option selected hidden>Pilih Customer</option>
                                                  @foreach ($user as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Paket</label>
                                                <select name="paket_id" id="paket_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                  <option selected hidden>Pilih Paket</option>
                                                  @foreach ($paket as $p)
                                                    <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_paket }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="col-md-3 mb-3">
                                                <label class="form-label fw-bold">Jumlah Paket</label>
                                                <input type="number" min="1" name="jumlah_paket" id="jumlah_paket" class="form-control shadow-none" value="1" required>
                                              </div>
                                              <div class="col-md-9 mb-3">
                                                <label class="form-label fw-bold">Harga</label>
                                                <input type="text" name="harga" id="harga" class="form-control shadow-none" placeholder="masukkan harga paket" required readonly>
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
                                        <th>Nama Customer</th>
                                        <th>Paket</th>
                                        <th>Jumlah_paket</th>
                                        <th>Harga</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($keranjang as $item)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $item->user['nama'] }}</td>
                                            <td>{{ $item->paket['nama_paket'] }}</td>
                                            <td>{{ $item->jumlah_paket}}</td>
                                            <td>{{ $item->harga}}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#edit_keranjang{{ $item->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <div class="modal fade" id="edit_keranjang{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <form action="{{ route('edit_keranjang', ['id' => $item->id]) }}" id="rooms-setting" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Paket</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label class="form-label fw-bold">Nama Customer</label>
                                                                            <select name="user_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                                                <option selected hidden>Pilih Customer</option>
                                                                                @foreach ($user as $p)
                                                                                <option value="{{ $p->id }}" {{ $item->user_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label class="form-label fw-bold">Paket</label>
                                                                            <select name="paket_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                                                                <option selected hidden>Pilih Paket</option>
                                                                                @foreach ($paket as $p)
                                                                                <option value="{{ $p->id }}" data-harga="{{ $p->harga }}" {{ $item->paket_id == $p->id ? 'selected' : '' }}>{{ $p->nama_paket }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                            <label class="form-label fw-bold">Jumlah Paket</label>
                                                                            <input type="number" min="1" name="jumlah_paket" class="form-control shadow-none" value="{{ $item->jumlah_paket }}">
                                                                        </div>
                                                                        <div class="col-md-9 mb-3">
                                                                            <label class="form-label fw-bold">Harga</label>
                                                                            <input type="text" name="harga" class="form-control shadow-none" value="Rp {{ $item->harga }}">
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
                                                <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title">Hapus</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                         Apakah benar Anda ingin menghapus Keranjang ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                            @method('delete')
                                                            @csrf
                                                            <a type="button"  href="{{ route('delete_keranjang', ['id' => $item->id]) }}" class="btn btn-primary">Iya</a>
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
        document.addEventListener('DOMContentLoaded', function () {
          const paketSelect = document.getElementById('paket_id');
          const jumlahPaketInput = document.getElementById('jumlah_paket');
          const hargaInput = document.getElementById('harga');

          function updateHarga() {
            const selectedPaket = paketSelect.options[paketSelect.selectedIndex];
            const hargaPerPaket = parseFloat(selectedPaket.getAttribute('data-harga')) || 0;
            const jumlahPaket = parseInt(jumlahPaketInput.value) || 1;
            const totalHarga = hargaPerPaket * jumlahPaket;
            hargaInput.value = Math.round(totalHarga); // Removed the decimals
          }

          paketSelect.addEventListener('change', updateHarga);
          jumlahPaketInput.addEventListener('input', updateHarga);
        });
    </script>


</body>

</html>
