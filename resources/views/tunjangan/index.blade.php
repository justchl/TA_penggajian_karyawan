@extends('template')
@section('title', 'Data Tunjangan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Tunjangan</h1>
    <p class="mb-4">Berikut list data tunjangan yang terdaftar.</p>

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
                    <h6 class="m-0 font-weight-bold text-primary">Data Tunjangan</h6>
                </div>

                <div class="col-lg-6 col-xs-12 text-right">
                <a href="{{ url('tunjangan/tambah') }}"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tunjangan</th>
                            <th>Nilai Tunjangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_tunjangan }}</td>
                                <td>{{ 'Rp. '.number_format($row->nilai_tunjangan, 0) }}</td>
                                <td>
                                    <a href="/tunjangan/edit/{{ $row->id_tunjangan }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                
                                    <a href="/tunjangan/delete/{{ $row->id_tunjangan }}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
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