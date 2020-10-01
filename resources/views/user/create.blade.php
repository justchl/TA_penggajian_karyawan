@extends('template')
@section('title', 'Tambah Data User')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form User</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User</h6>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-xs-12">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="col-lg-6 col-xs-12">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Level Akses</label>
                        <select class="form-control" name="level">
                            <option>Pilih Level</option>
                            @foreach ($level as $row)
                                <option value="{{ $row->id_level }}">{{ $row->hak_akses }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection