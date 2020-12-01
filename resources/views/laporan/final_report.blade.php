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

        <div class="col-lg-12 col-xs-12 mt-5">
            <div class="float-left">
                <p class="m-0">DAFTAR GAJI</p>
                <p class="text-uppercase">BULAN : {{ $bulan }} {{ $tahun }}</p>
            </div>

            <div class="float-right res-mediaPrint">
                <a href="{{ url('/laporan') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="javascript:void(0)" id="printNow" class="btn btn-success">Print <i class="ml-1 fa fa-print"></i></a>
            </div>
            <div class="table-responsive">
                <!-- DataTales Example -->
                <table class="table table-bordered table-detailLaporan" width="100%" cellspacing="0">
                    <thead>
                        <thead>
                            <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama</th>
                            <th rowspan="2">Jabatan</th>
                            <th rowspan="2">Pangkat<br>Golongan</th>
                            <th rowspan="2">Pendidikan</th>
                            <th rowspan="2">Gaji Pokok</th>
                            <th colspan="4">Tunjangan</th>
                            </tr>
                            <tr>
                            <td>Strukt</td>
                            <td>T.Pendidikan</td>
                            <td>Uang Makan</td>
                            <td>Total</td>
                            </tr>
                        </thead>
                    </thead>

                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_karyawan }}</td>
                                <td>{{ $row->jabatan }}</td>
                                <td>{{ $row->golongan }}</td>
                                <td>{{ $row->pendidikan }}</td>
                                <td>{{ 'Rp. '.number_format($row->gaji_pokok, 0) }}</td>
                                <td>{{ 'Rp. '.number_format($row->tunjangan_pendidikan + $row->nilai_tunjangan,0) }}</td>
                                <td>{{ 'Rp. '.number_format($row->tunjangan_pendidikan, 0) }}</td>
                                <td>{{ 'Rp. '.number_format($row->nilai_tunjangan, 0) }}</td>
                                <td>{{ 'Rp. '.number_format($row->total, 0) }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="5" class="font-weight-bold">Jumlah</td>
                            <td class="font-weight-bold">{{ 'Rp. '.number_format($totalGapok, 0) }}</td>
                            <td class="font-weight-bold">{{ 'Rp. '.number_format($totalTunjMakan+$totalTunjPendidikan,0) }}</td>
                            <td class="font-weight-bold">{{ 'Rp. '.number_format($totalTunjPendidikan, 0) }}</td>
                            <td class="font-weight-bold">{{ 'Rp. '.number_format($totalTunjMakan, 0) }}</td>
                            <td class="font-weight-bold">{{ 'Rp. '.number_format($grandTotal, 0) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
            <p>Mengetahui</br>Sekretaris Rektor</p>
            </br>
            </br>
            <p>IA Lysandari,SE.,MM</br>NIR 03053</p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
            <p>Denpasar, 1 Desember 2020</br>Ka/Sie Keuangan</p>
            </br>
            </br>
            <p>Ida Ayu Astuti, SE</br>NIR 83003</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
            <p>Meyetujui</br>Rektor ITEKES Bali</p>
            </br>
            </br>
            <p>I Gd Pt Darma Suyasa.,S.Kp.,M.Ng.,PH.D</br>NIR 98032</p>
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