<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.template.head_admin')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan Penjualan</h1>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Penjualan I Can Premium</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No WA</th>
                                    <th>Paket</th>
                                    <th>Jumlah</th>
                                    <th>Norek asal</th>
                                    <th>Norek Cust</th>
                                    <th>Total Harga</th>
                                    <th>Bukti</th>
                                    <th>Tgl/bln/thn</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($riwayat as $item)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $item->user['nama'] }}</td>
                                        <td>{{ $item->user['no_wa'] }}</td>
                                        <td>{{ $item->paket['nama_paket'] }}</td>
                                        <td>{{ $item->jumlah_paket }}</td>
                                        <td>{{ $item->pembayaran['nama_metode'] }}<br>{{ $item->pembayaran['rek_tujuan'] }}</td>
                                        <td>{{ $item->metode_asal }}<br>{{ $item->rek_asal }}</td>
                                        <td>{{ $item->total_harga }}</td>
                                        <td><img src="{{ asset('assets/img/upload/'.$item->bukti_pembayaran)}}" alt="" style="width: 100px"></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.control-sidebar -->
    </div>

</body>

<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
