<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cetak Laporan Gaji | Sistem Penggajian Karyawan</title>

    <!-- Custom fonts for this template -->
    <link href="{{ url('assets/vendor/fontawesome-free-web/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <!-- Custom styles for datatable -->
    <link href="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Custom styles for datepicker -->
    <link href="{{ url('assets/vendor/datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xs-12">
            <div class="header-report">
                <img src="{{ url('assets/img/itekes_logo.png') }}">

                <div class="title">
                    <h5 class="text-uppercase">institut teknologi dan kesehatan bali</h5>
                    <p>(ITEKES BALI)</p>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12 mt-3">
            {{-- <div class="float-left">
                <a href="{{ url('/laporan') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>

            <div class="text-right res-mediaPrint mb-3">
                <a href="javascript:void(0)" id="printNow" class="btn btn-success">Print <i class="ml-1 fa fa-print"></i></a>
            </div> --}}
            
            <div class="card">
                <div class="card-header d-block text-center">
                    <h4>Slip Gaji</h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $data->nama_karyawan }}</td>
                        </tr>

                        <tr>
                            <td>Gaji Pokok</td>
                            <td>:</td>
                            <td>{{ 'Rp. '.number_format($data->gaji_pokok,0) }}</td>
                        </tr>

                        <tr>
                            <td>Bulan</td>
                            <td>:</td>
                            <td>{{ $data->tanggal }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row justify-content-end mt-3">
                <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                    <p>Denpasar, 1 Desember 2020</br>Ka/Sie Keuangan</p>
                    </br>
                    </br>
                    <p>Ida Ayu Astuti, SE</br>NIR 83003</p>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
<!-- Bootstrap core JavaScript-->
<script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#printNow').click(function(){
            window.print();
        });
    })
</script>