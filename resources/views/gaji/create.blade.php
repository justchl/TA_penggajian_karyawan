@extends('template')
@section('title', 'Tambah Data Gaji')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Gaji</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <form action="{{ url('gaji/post') }}" class="form-gaji" method="post" autocomplete="off">
    {{ csrf_field() }}
    <div class="row">
        @if(\Session::has('msg_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }} <a href="{{ url('/tunjangan') }}" class="alert-link">Lihat Data</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-body detail-karyawan">
                    <div class="form-group">
                        <select class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" id="nik" name="nik">
                            <option value="">Pilih NIK / Karyawan</option>
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
                    <hr>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label><strong>NIK</strong></label>
                        </div>

                        <div class="col-lg-8">
                            <span id="label_nik"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label><strong>Nama</strong></label>
                        </div>

                        <div class="col-lg-8">
                            <span id="label_nama"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label><strong>Jenis Kelamin</strong></label>
                        </div>

                        <div class="col-lg-8">
                            <span id="label_gender"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label><strong>Tanggal Lahir</strong></label>
                        </div>

                        <div class="col-lg-8">
                            <span id="label_tgl_lahir"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label><strong>Status Kerja</strong></label>
                        </div>

                        <div class="col-lg-8">
                            <span id="label_status_kerja"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Gaji</h6>
                </div>

                <div class="card-body">
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
            </div>
        </div>
    </div>
    </form>
@endsection

@section('gaji.js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datepickerGaji').datepicker({
                autoclose : true
            });

            $('#nik').on('change', function(){
                var value = $('#nik').val();
                
                $.ajax({
                    type : 'GET',
                    url : '/get-karyawan/'+value,
                    success : function(res){
                        var data = res.data;
                        //Date Format
                        var tglLahir = moment(data[0].tanggal_lahir).format('MM/DD/YYYY');
                        
                        $('#label_nik').html(data[0].NIK);
                        $('#label_nama').html(data[0].nama_karyawan);
                        $('#label_tgl_lahir').html(tglLahir);
                        $('#label_gender').html(data[0].jenis_kelamin);
                        $('#label_status_kerja').html(data[0].status_kerja);
                    }
                })
            });
        })
    </script>
@endsection