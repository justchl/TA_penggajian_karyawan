@extends('template')
@section('title', 'Detail Laporan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Detail Laporan</h1>
    <p class="mb-4">Berikut informasi data detail laporan gaji.</p>

    <!-- DataTales Example -->
    <table class="table table-bordered table-detailLaporan" width="100%" cellspacing="0">
        <thead>
            <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">Nama</th>
                  <th rowspan="2">Jabatan</th>
                  <th rowspan="2">Masa Kerja</th>
                  <th rowspan="2">Pangkat<br>Golongan</th>
                  <th rowspan="2">Pendidikan</th>
                  <th rowspan="2">Gaji Pokok</th>
                  <th colspan="4">Tunjangan</th>
                </tr>
                <tr>
                  <td>Strukt</td>
                  <td>T.Pendidikan</td>
                  <td>Uang Makan</td>
                  <td>Total</td>
                </tr>
              </thead>
        </thead>

        <tbody>
            @php $no=1 @endphp
            @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama_karyawan }}</td>
                    <td>{{ $row->jabatan }}</td>
                    <td>{{ $row->masa_kerja }}</td>
                    <td>{{ $row->nama_golongan }}</td>
                    <td>{{ $row->pendidikan }}</td>
                    <td>{{ 'Rp. '.number_format($row->gaji_pokok, 0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->tunjangan_pendidikan + $row->nilai_tunjangan,0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->tunjangan_pendidikan, 0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->nilai_tunjangan, 0) }}</td>
                    <td>{{ 'Rp. '.number_format($row->total, 0) }}</td>
                </tr>

                <tr>
                    <td colspan="6" class="font-weight-bold">Jumlah</td>
                    <td class="font-weight-bold">{{ 'Rp. '.number_format($row->gaji_pokok, 0) }}</td>
                    <td class="font-weight-bold">{{ 'Rp. '.number_format($row->tunjangan_pendidikan + $row->nilai_tunjangan,0) }}</td>
                    <td class="font-weight-bold">{{ 'Rp. '.number_format($row->tunjangan_pendidikan, 0) }}</td>
                    <td class="font-weight-bold">{{ 'Rp. '.number_format($row->nilai_tunjangan, 0) }}</td>
                    <td class="font-weight-bold">{{ 'Rp. '.number_format($row->total, 0) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection