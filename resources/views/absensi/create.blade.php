@extends('template')
@section('title', 'Tambah Data Absensi')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Absensi</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Absensi</h6>
                </div>

                <form action="{{ url('absensi/post') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="card-body">
                        @if(\Session::has('msg_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }} <a href="{{ url('/absensi') }}" class="alert-link">Lihat Data</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Nama Karyawan <span class="text-danger">*</span></label>
                            <select class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik">
                                <option value="">Pilih Nama</option>
                                @foreach ($dataKaryawan as $row)
                                    <option value="{{ $row->NIK }}">{{ $row->nama_karyawan }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nik'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nik') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Tanggal <span class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" id="tglAbsensi" name="tanggal">
                            @if($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Jam Masuk <span class="text-danger">*</span></label>
                                <input type="time" class="form-control {{ $errors->has('masuk') ? 'is-invalid' : '' }}" name="masuk">
                                @if($errors->has('masuk'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('masuk') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Jam Pulang <span class="text-danger">*</span></label>
                                <input type="time" class="form-control {{ $errors->has('pulang') ? 'is-invalid' : '' }}" name="pulang">
                                @if($errors->has('pulang'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('pulang') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Status Kehadiran <span class="text-danger">*</span></label>
                            <select class="form-control {{ $errors->has('status_kehadiran') ? 'is-invalid' : '' }}" name="status_kehadiran">
                                <option value="">Pilih Status</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Alpha">Alpha</option>
                            </select>
                            @if($errors->has('status_kehadiran'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status_kehadiran') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Keterangan <span class="text-danger">*</span></label>
                            <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" rows="3"></textarea>
                            @if($errors->has('keterangan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('keterangan') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ url('/absensi') }}" class="btn btn-secondary mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('absensi.js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tglAbsensi').datepicker({
                autoclose : true,
                todayHighlight: true
            });
        })
    </script>
@endsection