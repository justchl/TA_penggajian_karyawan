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

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
            <div class="float-left res-mediaPrint">
                <a href="{{ url('/gaji') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>

            <div class="text-right res-mediaPrint mb-3">
                <a href="javascript:void(0)" id="printNow" class="btn btn-success">Print <i class="ml-1 fa fa-print"></i></a>
            </div>
            
            <div class="card slip-gaji">
                <div class="card-header pb-0 d-block text-center">
                    <h6>Slip Gaji</h6>
                </div>

                <div class="card-body">
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <h6 class="text-capitalize">Institut teknologi<br> dan kesehatan bali</h6>
                            <p>Jl. Tukad Balian No.180,<br> Renon, Kec. Denpasar Sel,<br>Kota Denpasar, <br>Bali 80227</p>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <table class="table">   
                                <tr>
                                    <td>Periode</td>
                                    <td>:</td>
                                    <td>{{ Carbon\Carbon::parse($data->tanggal)->format('M Y') }}</td>
                                </tr>

                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $data->nama_karyawan }}</td>
                                </tr>
        
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td>{{ $data->jabatan }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ $data->status_kerja }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="mt-0">

                    <div class="wrap-grey">
                        <table class="table m-0">
                            <tr>
                                <td>Golongan</td>
                                <td class="text-right">{{ $data->nama_golongan }}</td>
                            </tr>

                            <tr>
                                <td>Masa Kerja</td>
                                <td class="text-right">{{ $data->masa_kerja }} Bulan</td>
                            </tr>
    
                            <tr>
                                <td>Gaji Pokok</td>
                                <td class="text-right">{{ 'Rp. '.number_format($data->gaji_pokok,0) }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="wrap-grey">
                        <h6>Tunjangan</h6>
                        <hr>
                        <table class="table m-0">
                            <tr>
                                <td>Makan</td>
                                <td class="text-right">{{ 'Rp. '.number_format($data->tunjangan_makan,0) }}</td>
                            </tr>
    
                            <tr>
                                <td>Pendidikan</td>
                                <td class="text-right">{{ 'Rp. '.number_format($data->tunjangan_pendidikan,0) }}</td>
                            </tr>
    
                            <tr>
                                <td>Jabatan</td>
                                <td class="text-right">{{ 'Rp. '.number_format($data->tunjangan_struktural,0) }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="wrap-grey">
                        <table class="table m-0">
                            <tr>
                                <td>Potongan</td>
                                <td class="text-right">{{ 'Rp. '.number_format($data->potongan,0) }}</td>
                            </tr>
    
                            <tr>
                                <td>Lembur (1 Jam x 15000)</td>
                                <td class="text-right">{{ 'Rp. '.number_format($data->lembur,0) }}</td>
                            </tr>
    
                            <tr>
                                <td>Tambahan</td>
                                <td class="text-right">{{ 'Rp. '.number_format($data->tambahan,0) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <table class="table m-0">
                        <tr>
                            <td class="font-weight-bold text-uppercase">total diterima karyawan</td>
                            <td class="font-weight-bold text-right">{{ 'Rp. '.number_format($data->total,0) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row justify-content-end mt-3">
                <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                    <p>Denpasar, {{ date('d M Y') }}</br>Ka/Sie Keuangan</p>
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