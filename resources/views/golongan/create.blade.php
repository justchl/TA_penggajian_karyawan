@extends('template')
@section('title', 'Edit Data Golongan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Golongan</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Golongan</h6>
                </div>

                <form action="{{ url('golongan/post') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="card-body">
                        @if(\Session::has('msg_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }} <a href="{{ url('/golongan') }}" class="alert-link">Lihat Data</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Nama Golongan</label>
                            <input type="text" class="form-control {{ $errors->has('nama_golongan') ? 'is-invalid' : '' }}" name="nama_golongan">
                            @if($errors->has('nama_golongan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_golongan') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" class="form-control {{ $errors->has('gaji_pokok') ? 'is-invalid' : '' }}" name="gaji_pokok" onkeypress="return /[0-9]/i.test(event.key)">
                            @if($errors->has('gaji_pokok'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gaji_pokok') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="/golongan" class="btn btn-secondary mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection