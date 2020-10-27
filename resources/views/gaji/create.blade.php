@extends('template')
@section('title', 'Tambah Data Gaji')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Gaji</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>
    
    <form class="form-gaji" method="post" autocomplete="off">
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
                            <label><strong>Jabatan</strong></label>
                        </div>

                        <div class="col-lg-8">
                            <span id="label_jabatan"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label><strong>Golongan</strong></label>
                        </div>

                        <div class="col-lg-8">
                            <span id="label_golongan"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepickerGaji" name="tgl_gaji">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-xs-12">
                            <label>Gaji Pokok</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                                </div>
                                <input type="number" id="gaji_pokok" class="form-control" name="gaji_pokok" value="0">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-xs-12">
                            <label>Potongan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                                </div>
                                <input type="number" class="form-control" name="potongan" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <fieldset class="tunjangan-border">
                            <legend>Tunjangan <span class="text-danger">*</span></legend>
                            
                            <div class="form-group">
                                <label>Tunj. Makan</label>
                                <a href="{{ url('tunjangan/edit/'.$dataTunjangan->id_tunjangan) }}" class="float-right"><i class="fa fa-edit" style="font-size: 12px;"></i> Edit Tunjangan</a>
                                <input type="hidden" class="form-control" name="tunjangan" value="{{ $dataTunjangan->id_tunjangan }}">
                                <input type="number" class="form-control" name="nilai_tunjangan" value="{{ $dataTunjangan->nilai_tunjangan }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tunj. Pendidikan</label>
                                <input type="number" class="form-control" name="tunjangan_pendidikan" value="0">
                            </div>

                            <div class="form-group">
                                <label>Tunj. Stuktural</label>
                                <input type="number" class="form-control" name="tunjangan_struktural" value="0">
                            </div>
                        </fieldset>
                        {{-- @if($errors->has('jenis_kelamin'))
                            <small class="text-danger">
                                {{ $errors->first('jenis_kelamin') }}
                            </small>
                        @endif --}}
                    </div>

                    <div class="form-group">
                        <label>Tambahan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                            </div>
                            <input type="number" class="form-control" name="tambahan" value="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" id="total_gaji" class="form-control" name="total" value="0" style="height: 60px; font-size:2rem;" readonly>
                    </div>

                    <div class="form-group m-0 float-right">
                        <button type="button" class="btn btn-secondary mr-1">Cancel</button>
                        <button type="button" id="submit" class="btn btn-primary">Submit</button>
                    </div>
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
                        
                        $('#label_nik').html(data[0].NIK);
                        $('#label_nama').html(data[0].nama_karyawan);
                        $('#label_golongan').html(data[0].golongan);
                        $('#label_gender').html(data[0].jenis_kelamin);
                        $('#label_jabatan').html(data[0].jabatan);
                    }
                })
            });

            $('#submit').on('click', function(){
                var total = 0;
                var gapok = $('input[name="gaji_pokok"]').val();
                var potongan = $('input[name="potongan"]').val();
                
                total =+ (gapok - potongan);

                $('#total_gaji').val(total);
            });
        })
    </script>
@endsection