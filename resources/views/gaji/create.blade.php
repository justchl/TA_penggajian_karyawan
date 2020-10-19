@extends('template')
@section('title', 'Tambah Data Gaji')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Gaji</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-xs-12">
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

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Tanggal</label>
                                <input type="text" class="form-control" id="datepickerGaji" name="tgl_gaji">
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Gaji Pokok</label>
                                <input type="number" class="form-control" name="gaji_pokok">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Potongan</label>
                                <input type="number" class="form-control" name="potongan">
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Total Lembur</label>
                                <input type="number" class="form-control" name="total_lembur">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Pajak</label>
                                <input type="number" class="form-control" name="pajak">
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Tambahan</label>
                                <input type="number" class="form-control" name="tambahan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Total</label>
                            <textarea type="number" class="form-control" name="total" readonly></textarea>
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

@section('gaji.js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datepickerGaji').datepicker({
                autoclose : true
            });
        })
    </script>
@endsection