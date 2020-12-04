@extends('template')
@section('title', 'Tambah Data Gaji')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Edit Gaji</h1>
    <p class="mb-4">Pastikan data yang anda edit sudah benar.</p>
    
    @if(\Session::has('msg_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }} <a href="{{ url('/gaji') }}" class="alert-link">Lihat Data</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form class="form-gaji" action="{{ url('gaji/update/'.$row->id_gaji) }}" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-body detail-karyawan">
                    <div class="form-group">
                        <select class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" id="nik" name="nik">
                            <option value="">Pilih NIK / Karyawan</option>
                            @foreach ($dataKaryawan as $data)
                                <option value="{{ $data->NIK }}" {{ $row->NIK == $data->NIK ? 'selected' : '' }}>{{ $data->NIK }} - {{ $data->nama_karyawan }}</option>
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
                            <input type="text" class="form-control {{ $errors->has('tgl') ? 'is-invalid' : '' }}" id="datepickerGaji" name="tgl" value="{{ date('d/m/Y', strtotime($row->tanggal)) }}" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            @if($errors->has('tgl'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-xs-12">
                            <label>Gaji Pokok</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                                </div>
                                <input type="text" class="form-control gaji {{ $errors->has('gaji_pokok') ? 'is-invalid' : '' }}" id="gaji_pokok" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="calculateGaji()" name="gaji_pokok" value="{{ $row->gaji_pokok }}" readonly>
                                @if($errors->has('gaji_pokok'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gaji_pokok') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-xs-12">
                            <label>Potongan</label>

                            <a href="#" data-toggle="modal" data-target="#modalInfo" class="float-right d-none" id="infoPotongan">
                                <i class="fa fa-info-circle" style="font-size: 11px;"></i> Info Potongan
                            </a>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                                </div>
                                <input type="text" class="form-control gaji" id="potongan" name="potongan" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="calculateGaji()" value="{{ $row->potongan }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <fieldset class="tunjangan-fieldset">
                            <legend>Tunjangan <span class="text-danger">*</span></legend>
                            
                            <div class="form-group">
                                <label>Tunj. Makan</label>
                                <a href="{{ url('tunjangan/edit/'.$dataTunjangan->id_tunjangan) }}" class="float-right"><i class="fa fa-pencil-alt" style="font-size: 12px;"></i> Edit Tunjangan</a>
                                <input type="hidden" class="form-control" name="id_tunjangan" value="{{ $dataTunjangan->id_tunjangan }}">
                                <input type="hidden" class="form-control" id="t_makanan" name="tunjangan_makan" value="{{ $dataTunjangan->nilai_tunjangan }}">
                                <input type="text" class="form-control" value="{{ 'Rp. '.number_format($dataTunjangan->nilai_tunjangan, 0) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tunj. Pendidikan</label>
                                <input type="text" class="form-control gaji {{ $errors->has('tunjangan_pendidikan') ? 'is-invalid' : '' }}" id="t_pendidikan" name="tunjangan_pendidikan" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="calculateGaji()" value="{{ $row->tunjangan_pendidikan }}">
                                @if($errors->has('tunjangan_pendidikan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('tunjangan_pendidikan') }}
                                    </div>
                                @endif
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-xs-12">
                            <label>Tambahan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                                </div>
                                <input type="text" class="form-control gaji" id="tambahan" name="tambahan" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="calculateGaji()" value="{{ $row->tambahan }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-xs-12">
                            <label>Lembur</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 14px;">Rp.</span>
                                </div>
                                <input type="text" class="form-control gaji" id="lembur" name="lembur" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="calculateGaji()" value="{{ $row->lembur }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" id="total" name="total" value="{{ $row->total }}" style="height: 60px; font-size:2rem;" readonly>
                    </div>

                    <div class="form-group m-0 float-right">
                        <button type="button" class="btn btn-secondary mr-1">Cancel</button>
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Modal Info -->
    <div id="modalInfo" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 400px;">
            <!-- Modal content-->
            <div class="modal-content notify-content">
                <div class="modal-body">
                    <div class="wrap-img">
                        <img src="{{ url('assets/img/notify.png') }}">
                    </div>
                    
                    <div class="description">
                        <p>Anda dikenakan potongan 50% dari tunjangan makan, karena mengalami keterlambatan absen.</p>
                    </div>
                    
                    <div class="text-center mb-3">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Dimengerti!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('gaji.js')
    <script type="text/javascript">       
        $(document).ready(function(){
            $('#datepickerGaji').datepicker({
                autoclose: true,
                todayHighlight : true,
            }).datepicker("update", new Date());

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

                        potonganGaji();
                    }
                })
            });
        });

        function calculateGaji(){
            var gaji_pokok           = document.getElementById('gaji_pokok');
            var tunjangan_makan      = document.getElementById('t_makanan');
            var tunjangan_pendidikan = document.getElementById('t_pendidikan');
            var tambahan             = document.getElementById('tambahan');
            var potongan             = document.getElementById('potongan');
            var total                = document.getElementById('total');
            
            if(isNaN){
                total.value = (parseFloat(gaji_pokok.value) - parseFloat(potongan.value)) + parseFloat(tunjangan_makan.value) + parseFloat(tunjangan_pendidikan.value) + parseFloat(tambahan.value);
            }else{
                total.value = 0;
            }
        }

        function potonganGaji(){
            $('#potongan').val(0);
            var nik = $('#nik').val();
            var tunjanganMakan = $('#t_makanan').val();

            $.ajax({
                type : 'GET',
                url : '/get-absensi/'+nik,
                success : function(res){
                    if(res.data.length == 0){
                        $('#potongan').val(0);
                        $('#infoPotongan').removeClass('d-block').addClass('d-none'); 
                    }else{
                        var totalPotongan = tunjanganMakan * 0.5;
                        $('#potongan').val(totalPotongan);

                        $('#infoPotongan').removeClass('d-none').addClass('d-block');
                    }
                }
            })
        }
    </script>
@endsection

@section('input-currency.js')
    <script type="text/javascript">
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            rupiah     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }

        // var rupiah1 = document.getElementById('gaji_pokok');
        // var rupiah2 = document.getElementById('potongan');
        // var rupiah3 = document.getElementById('t_pendidikan');
        // var rupiah4 = document.getElementById('tambahan');

        // rupiah1.addEventListener('keyup', function(e){
        //     rupiah1.value = formatRupiah(this.value, '');
        // });

        // rupiah2.addEventListener('keyup', function(e){
        //     rupiah2.value = formatRupiah(this.value, '');
        // });

        // rupiah3.addEventListener('keyup', function(e){
        //     rupiah3.value = formatRupiah(this.value, '');
        // });

        // rupiah4.addEventListener('keyup', function(e){
        //     rupiah4.value = formatRupiah(this.value, '');
        // });
    </script>
@endsection