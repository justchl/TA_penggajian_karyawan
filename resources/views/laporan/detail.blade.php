@extends('template')
@section('title', 'Detail Laporan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Detail Laporan</h1>
    <p class="mb-4">Berikut informasi data detail laporan gaji.</p>

    <!-- DataTales Example -->
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Pangkat Golongan</th>
                <th>Pendidikan</th>
                <th>Gaji Pokok</th>
                <th colspan="4">Tunjangan</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->nama_karyawan }}</td>
                    <td>{{ $row->jabatan }}</td>
                    <td>{{ $row->golongan }}</td>
                    <td>{{ $row->pendidikan }}</td>
                    <td>{{ 'Rp. '.number_format($row->gaji_pokok, 0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->tunjangan_pendidikan + $row->nilai_tunjangan,0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->tunjangan_pendidikan, 0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->nilai_tunjangan, 0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->total, 0) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection