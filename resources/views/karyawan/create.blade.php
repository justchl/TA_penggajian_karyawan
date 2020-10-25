@extends('template')
@section('title', 'Tambah Data Karyawan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Karyawan</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>

    @if(\Session::has('msg_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }} <a href="/karyawan" class="alert-link">Lihat Data</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Form Add Karyawan -->
    <form action="/karyawan/post" class="form-karyawan" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                    </div>

                    <div class="card-body">
                        <div class="text-center">
                            <img id="img-preview" src="{{ url('assets/img/ava.png') }}" class="mb-3 profile-img">
                        </div>

                        <div class="form-group">
                            <label>File Upload <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input {{ $errors->has('file') ? 'is-invalid' : '' }}" id="inputGroupFile01" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if($errors->has('file'))
                                <small class="text-danger">
                                    {{ $errors->first('file') }}
                                </small>
                            @endif
                        </div>

                        <div class="req-foto-wrap">
                            <ul>
                                <li>Format file yang diperbolehkan yaitu .jpg, .jpeg</li>
                                <li>Maksimal ukuran file yaitu 1 MB</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>NIK <span class="text-danger">*</span></label>
                            <input type="number" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik">
                            @if($errors->has('nik'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nik') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama">
                                @if($errors->has('nama'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nama') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Tempat / Tanggal Lahir <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend date-born">
                                        <input type="text" class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }}" placeholder="Tempat" name="tempat">
                                    </div>
                                    <input type="text" id="datepicker" name="tgl_lahir" class="form-control {{ $errors->has('tgl_lahir') ? 'is-invalid' : '' }}" placeholder="Tanggal Lahir">
                                    @if($errors->has('tempat') && $errors->has('tgl_lahir'))
                                        <div class="invalid-feedback">
                                            The tempat & tanggal lahir is required
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <fieldset class="gender-border {{ $errors->has('jenis_kelamin') ? 'border-danger' : '' }}">
                                <legend>Jenis Kelamin <span class="text-danger">*</span></legend>
                                
                                <div class="row">
                                    <div class="col-lg-6 col-xs-12">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customRadioLaki" name="jenis_kelamin" value="Laki-laki">
                                            <label class="custom-control-label" for="customRadioLaki">Laki-laki</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xs-12">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customRadioPerempuan" name="jenis_kelamin" value="Perempuan">
                                            <label class="custom-control-label" for="customRadioPerempuan">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            @if($errors->has('jenis_kelamin'))
                                <small class="text-danger">
                                    {{ $errors->first('jenis_kelamin') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Telp <span class="text-danger">*</span></label>
                            <input type="number" class="form-control {{ $errors->has('telp') ? 'is-invalid' : '' }}" name="telp">
                            @if($errors->has('telp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telp') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Golongan <span class="text-danger">*</span></label>
                                <select class="form-control {{ $errors->has('golongan') ? 'is-invalid' : '' }}" name="golongan">
                                    <option value="">Pilih Golongan</option>
                                    <option value="Penata Tk I/III d">Penata Tk I/III d</option>
                                    <option value="Penata I/III D Lektor">Penata I/III D Lektor</option>
                                    <option value="Penata I/III D As Ahli">Penata I/III D As Ahli</option>
                                    <option value="Penata/III c Lektor">Penata/III c Lektor</option>
                                    <option value="Penata Muda/II a">Penata Muda/II a</option>
                                    <option value="Penata Muda TK I/III b">Penata Muda TK I/III b</option>
                                </select>
                                @if($errors->has('golongan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('golongan') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Jabatan <span class="text-danger">*</span></label>
                                <select class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" name="jabatan">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="Rektor">Rektor</option>
                                    <option value="Wakil Rektor">Wakil Rektor</option>
                                    <option value="KaProdi S.1 & Ners">KaProdi S1 & Ners</option>
                                    <option value="KaProdi S.1 & Ners">Plt.Sek.Prodi S1 Kep</option>
                                    <option value="Wakil Rektor">Dosen</option>
                                </select>
                                @if($errors->has('jabatan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jabatan') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Pendidikan <span class="text-danger">*</span></label>
                                <select class="form-control {{ $errors->has('pendidikan') ? 'is-invalid' : '' }}" name="pendidikan">
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA / Sederajat">SMA / Sederajat</option>
                                    <option value="D3">D3</option>
                                    <option value="D4 / S1">D4 / S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                @if($errors->has('pendidikan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('pendidikan') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Agama <span class="text-danger">*</span></label>
                                <select class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" name="agama">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                                @if($errors->has('agama'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('agama') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Status Pernikahan <span class="text-danger">*</span></label>
                                <select class="form-control {{ $errors->has('status_pernikahan') ? 'is-invalid' : '' }}" name="status_pernikahan">
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                                @if($errors->has('status_pernikahan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('status_pernikahan') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Status Kerja <span class="text-danger">*</span></label>
                                <select class="form-control {{ $errors->has('status_kerja') ? 'is-invalid' : '' }}" name="status_kerja">
                                    <option value="">Pilih Status</option>
                                    <option value="Tetap">Tetap</option>
                                    <option value="Kontrak">Kontrak</option>
                                </select>
                                @if($errors->has('status_kerja'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('status_kerja') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" rows="3" name="alamat"></textarea>
                            @if($errors->has('alamat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alamat') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="/karyawan" class="btn btn-secondary mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('karyawan.js')
    <script type="text/javascript">
        $(document).ready(function(){
            //Init Datepicker
            $('#datepicker').datepicker({
                autoclose : true
            });

            //Get file name
            $('#inputGroupFile01').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(cleanFileName);
            });
        })
    </script>
@endsection