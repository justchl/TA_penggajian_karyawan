@extends('template')
@section('title', 'Laporan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
    <p class="mb-4">Berikut informasi data laporan gaji.</p>

    <!-- DataTales Example -->
    @if(\Session::has('msg_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-9 col-xs-12">
                    <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
                </div>

                <div class="col-lg-3 col-xs-12 text-right">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterDatepicker" placeholder="Filter Date">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <a href="#" style="font-size: 14px; color:#333;">
                                    <i class="fa fa-filter"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    {{-- <a href="#"><i class="fa fa-print"></i> Print All</a> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Tanggal</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $row->nama_karyawan }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ 'Rp. '.number_format($row->gaji_pokok, 0) }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $row->nama_tunjangan }} {{ 'Rp. '.number_format($row->nilai_tunjangan) }}</li>
                                        <li>Pendidikan {{ 'Rp. '.number_format($row->tunjangan_pendidikan) }}</li>
                                    </ul>
                                </td>
                                <td>{{ 'Rp. '.number_format($row->total, 0) }}</td>
                                <td>
                                    <a href="/laporan/detail/{{ $row->id_gaji }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('laporan.js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#filterDatepicker').datepicker({
                autoclose: true,
                todayHighlight : true,
            });
        });
    </script>
@endsection