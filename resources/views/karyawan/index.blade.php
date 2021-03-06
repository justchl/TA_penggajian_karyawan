@extends('template')
@section('title', 'Data Karyawan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>
    <p class="mb-4">Berikut list data karyawan yang terdaftar.</p>

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
                    <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                </div>

                <div class="col-lg-6 col-xs-12 text-right">
                <a href="{{ url('karyawan/tambah') }}"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Pendidikan</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->NIK }}</td>
                                <td>{{ $row->nama_karyawan }}</td>
                                {{-- <td>
                                    <img src="{{ $row->foto == null ? 'assets/img/default_img.png' : 'assets/img/foto/'.$row->foto }}" class="w-100">
                                </td> --}}
                                <td>{{ $row->tempat_lahir }}, {{ $row->tanggal_lahir }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->jabatan }}</td>
                                <td>{{ $row->nama_golongan }}</td>
                                <td>{{ $row->pendidikan }}</td>
                                <td>{{ $row->no_telp }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Opsi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/karyawan/detail/{{ $row->NIK }}"><i class="fa fa-eye"></i> Detail</a>
                                            <a class="dropdown-item" href="/karyawan/edit/{{ $row->NIK }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="/karyawan/delete/{{ $row->NIK }}"><i class="fa fa-trash"></i> Delete</a>
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