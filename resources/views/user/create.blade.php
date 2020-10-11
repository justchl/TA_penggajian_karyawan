@extends('template')
@section('title', 'Tambah Data User')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form User</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form User</h6>
                </div>

                <form action="{{ url('user/post') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="card-body">
                        @if(\Session::has('msg_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }} <a href="{{ url('/user') }}" class="alert-link">Lihat Data</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama">
                            @if($errors->has('nama'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Username</label>
                                <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username">
                                @if($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Password</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Level Akses</label>
                            <select class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level">
                                <option value="">Pilih Level</option>
                                @foreach ($level as $row)
                                    <option value="{{ $row->id_level }}">{{ $row->hak_akses }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="/user" class="btn btn-secondary mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection