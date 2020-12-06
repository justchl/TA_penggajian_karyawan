@extends('template')
@section('title', 'Detail Karyawan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Karyawan</h1>
    <p class="mb-4">Berikut informasi data karyawan yang terdaftar.</p>

    <div class="row detail-karyawan">
        <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                </div>

                <div class="card-body text-center">
                    <img src="{{ $data->foto == null ? '/assets/img/default_img.png' : '/assets/img/foto/'.$data->foto }}" class="detail-foto">
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Karyawan</h6>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-custom">
                        <tr>
                            <td class="font-weight-bold">NIK</td>
                            <td>:</td>
                            <td>{{ $data->NIK }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Nama Lengkap</td>
                            <td>:</td>
                            <td>{{ $data->nama_karyawan }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Tempat / Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $data->tempat_lahir }} / {{ $data->tanggal_lahir }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">No Telp</td>
                            <td>:</td>
                            <td>{{ $data->no_telp }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Agama</td>
                            <td>:</td>
                            <td>{{ $data->agama }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Golongan</td>
                            <td>:</td>
                            <td>{{ $data->nama_golongan }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Jabatan</td>
                            <td>:</td>
                            <td>{{ $data->jabatan }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Pendidikan</td>
                            <td>:</td>
                            <td>{{ $data->pendidikan }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Status Kerja</td>
                            <td>:</td>
                            <td>{{ $data->status_kerja }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Status Pernikahan</td>
                            <td>:</td>
                            <td>{{ $data->status_pernikahan }}</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">Alamat</td>
                            <td>:</td>
                            <td class="text-capitalize">{{ $data->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection