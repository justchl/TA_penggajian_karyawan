@extends('template')
@section('title', 'Tambah Data Gaji')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Gaji</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Gaji</h6>
                </div>

                <form action="{{ url('gaji/post') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="card-body">
                        @if(\Session::has('msg_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }} <a href="{{ url('/tunjangan') }}" class="alert-link">Lihat Data</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>NIK</label>
                            <select class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik">
                                <option value="">Pilih NIK</option>
                                @foreach ($dataKaryawan as $row)
                                    <option value="{{ $row->NIK }}">{{ $row->NIK }} - {{ $row->nama_karyawan }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nik'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nik') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Nama Tunjangan</label>
                            <input type="text" class="form-control {{ $errors->has('nama_tunjangan') ? 'is-invalid' : '' }}" name="nama_tunjangan">
                            @if($errors->has('nama_tunjangan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_tunjangan') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Nilai Tunjangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                                </div>

                                <input type="number" class="form-control {{ $errors->has('nilai_tunjangan') ? 'is-invalid' : '' }}" name="nilai_tunjangan">
                                @if($errors->has('nilai_tunjangan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nilai_tunjangan') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ url('/tunjangan') }}" class="btn btn-secondary mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection