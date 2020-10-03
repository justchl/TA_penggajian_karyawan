@extends('template')
@section('title', 'Tambah Data Karyawan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Karyawan</h1>
    <p class="mb-4">Silahkan isi data dibawah ini dengan benar.</p>

    <!-- Form Add Karyawan -->
    <form action="" class="form-karyawan">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                    </div>

                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ url('assets/img/ava.png') }}" class="mb-3" style="max-width:150px;">
                        </div>

                        <div class="form-group">
                            <label>File Upload <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
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
                            <input type="number" class="form-control" name="">
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="">
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Tempat / Tanggal Lahir <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend date-born">
                                        <input type="text" class="form-control" placeholder="Tempat">
                                    </div>
                                    <input type="date" class="form-control" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <fieldset class="gender-border">
                                <legend>Jenis Kelamin</legend>
                                
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
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Telp</label>
                                <input type="number" class="form-control" name="">
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Jabatan</label>
                                <select class="form-control" name="">
                                    <option value="">Pilih Jabatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Pendidikan</label>
                                <select class="form-control" name="">
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="">SD</option>
                                    <option value="">SMP</option>
                                    <option value="">SMA / Sederajat</option>
                                    <option value="">Sarjana</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Agama</label>
                                <select class="form-control" name="">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 col-xs-12">
                                <label>Status Pernikahan</label>
                                <select class="form-control" name="">
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <label>Status Kerja</label>
                                <select class="form-control" name="">
                                    <option value="">Pilih Status</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name=""></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection