@extends('template')
@section('title', 'Data User')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-4">Berikut list data user yang terdaftar.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>

                <div class="col-lg-6 col-xs-12 text-right">
                <a href="{{ url('user/tambah') }}"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_user }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->hak_akses }}</td>
                                @if ($row->status == 1)
                                    <td><span class="badge badge-fill badge-success">Aktif</span></td>
                                @endif
                                @if ($row->status == 0)
                                    <td><span class="badge badge-fill badge-danger">Nonaktif</span></td>
                                @endif
                                <td>
                                    <a href="/user/edit/{{ $row->id_user }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                
                                    <a href="/user/delete/{{ $row->id_user }}" class="btn btn-danger">
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