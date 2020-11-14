@extends('template')
@section('title', 'Data Absensi')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    <p class="mb-4">Berikut list data absensi karyawan.</p>

    <!-- DataTales Example -->
    @if(\Session::has('msg_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(\Session::has('msg_error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="mr-1"><i class="fa fa-check-circle"></i></span> {{ Session::get('msg_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
                </div>

                <div class="col-lg-6 col-xs-12 text-right">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modalImport"> Import Data</a> / <a href="{{ url('absensi/tambah') }}"> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Status Kehadiran</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Pulang</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody> 
                        @php $no = 1; @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->NIK }} a.n {{ $row->nama_karyawan }}</td>
                                <td>{{ $row->status_kehadiran }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ $row->masuk }}</td>
                                <td>{{ $row->pulang }}</td>
                                <td>{{ $row->keterangan }}</td>
                                <td>
                                    <a href="/absensi/edit/{{ $row->id_absensi }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                
                                    <a href="/absensi/delete/{{ $row->id_absensi }}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    <div id="modalImport" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content modal-import">
                <form action="{{ url('/absensi/uploadFile') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="wrap-img">
                            <img src="{{ url('assets/img/file_upload2.png') }}" alt="File Upload">
                            <div class="desc text-center">
                                <h4>Upload File Disini</h4>
                                <p>Silahkan upload file absensi dalam bentuk excel ke form dibawah ini.</p>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input {{ $errors->has('file') ? 'is-invalid' : '' }}" id="inputGroupFile01" name="file">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        @if($errors->has('file'))
                            <small class="text-danger">
                                {{ $errors->first('file') }}
                            </small>
                        @endif

                        <div class="req-file mt-3">
                            <ul>
                                <li>Format file yang disarankan .xls, .xlsx</li>
                                <li>Maksimal ukuran file adalah 1MB (MegaByte)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('absensi.js')
    <script type="text/javascript">
        $(document).ready(function(){
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