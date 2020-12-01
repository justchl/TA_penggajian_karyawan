@extends('template')
@section('title', 'Laporan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
    <p class="mb-4">Berikut informasi data laporan gaji.</p>

    <!-- DataTales Example -->
    @if(\Session::has('msg_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <a href="{{ url('laporan/cetak?bulan='.$bulan.'&tahun='.$tahun) }}" class="btn btn-success" id="printAll"><i class="fa fa-print"></i> Print All</a>
                </div>

                <div class="col-lg-4 col-xs-12 text-right">
                    <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="form-control" name="month" id="filterMonth" style="border-top-right-radius:0px; border-bottom-right-radius:0px;">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="year" id="filterYear" maxlength="4" placeholder="Ketik tahun" onkeypress="return /[0-9]/i.test(event.key)">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <a href="#" id="filterBtn" style="font-size: 14px; color:#333;">
                                    <i class="fa fa-filter"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Tanggal</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="dataLaporan">
                        @php $no=1 @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $row->nama_karyawan }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ 'Rp. '.number_format($row->gaji_pokok, 0) }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $row->nama_tunjangan }} {{ 'Rp. '.number_format($row->nilai_tunjangan) }}</li>
                                        <li>Pendidikan {{ 'Rp. '.number_format($row->tunjangan_pendidikan) }}</li>
                                    </ul>
                                </td>
                                <td>{{ 'Rp. '.number_format($row->total, 0) }}</td>
                                <td>
                                    <a href="/laporan/detail/{{ $row->id_gaji }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('laporan.js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#filterBtn').click(function(e){
                e.preventDefault();
                
                var month = $('select[name=month]').val();
                var year  = $('input[name=year]').val();

                $.ajax({
                    type : 'POST',
                    url : '/laporan/filter',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data : {
                        month : month,
                        year : year
                    },
                    success : function(res){
                        var data = res.data;
                        //Reset Form
                        $('form').trigger('reset');
                        $('#dataTable').DataTable().clear().destroy();

                        var dataTable = '';
                        var no = 1;

                        for (var i = 0; i < data.length; i++) {
                            dataTable += '<tr>'+
                                         '<td>'+ no++ +'</td>'+
                                         '<td>'+ data[i].nama_karyawan +'</td>'+
                                         '<td>'+ data[i].tanggal +'</td>'+
                                         '<td>'+ data[i].gaji_pokok +'</td>'+
                                         '<td>'+
                                            '<ul>'+
                                                '<li>'+ data[i].nama_tunjangan +' '+ data[i].nilai_tunjangan +'</li>'+
                                                '<li>Pendidikan '+ data[i].tunjangan_pendidikan +'</li>'+
                                            '</ul>'+
                                         '</td>'+
                                         '<td>'+ data[i].total +'</td>'+
                                         '<td>'+
                                            '<a href="/laporan/detail/'+ data[i].id_gaji +'" class="btn btn-primary">'+
                                                '<i class="fa fa-eye"></i>'+
                                            '</a>'+
                                         '</td>'+
                                         '</tr>';
                        }

                        $('#printAll').attr('href',"/laporan/cetak?bulan="+month+"&tahun="+year);

                        $('#dataLaporan').html(dataTable);
                        $('#dataTable').dataTable();
                    },
                    error : function(res){
                        console.log(res);
                    }
                });
            });
        });
    </script>
@endsection