@extends('template')
@section('title', 'Data Gaji')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Gaji</h1>
    <p class="mb-4">Berikut list data gaji yang terdaftar.</p>

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
                <div class="col-lg-6 col-xs-12">
                    <h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
                </div>

                <div class="col-lg-6 col-xs-12 text-right">
                <a href="{{ url('gaji/tambah') }}"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Tanggal</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Tambahan</th>
                            <th>Potongan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($dataGaji as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_karyawan }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ 'Rp. '.number_format($row->gaji_pokok, 0) }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $row->nama_tunjangan }} {{ 'Rp. '.number_format($row->nilai_tunjangan) }}</li>
                                        <li>Pendidikan {{ 'Rp. '.number_format($row->tunjangan_pendidikan) }}</li>
                                    </ul>
                                </td>
                                <td>{{ 'Rp. '.number_format($row->tambahan, 0) }}</td>
                                <td>{{ 'Rp. '.number_format($row->potongan, 0) }}</td>
                                <td>{{ 'Rp. '.number_format($row->total, 0) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Opsi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/gaji/edit/{{ $row->id_gaji }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="/gaji/delete/{{ $row->id_gaji }}"><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection