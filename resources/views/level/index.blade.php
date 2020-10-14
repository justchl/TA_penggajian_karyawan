@extends('template')
@section('title', 'Data Level User')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Level User</h1>
    <p class="mb-4">Berikut list data level user yang terdaftar.</p>

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
                <div class="col-lg-6 col-xs-12">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>

                <div class="col-lg-6 col-xs-12 text-right">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Hak Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->hak_akses }}</td>
                                <td>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modalEdit{{ $row->id_level }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                
                                    <a href="/level/delete/{{ $row->id_level }}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div id="modalEdit{{ $row->id_level }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Level</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <form method="POST" action="{{ url('level/update/'.$row->id_level) }}" autocomplete="off">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Hak Akses</label>
                                                        <input type="text" class="form-control {{ $errors->has('hak_akses') ? 'is-invalid' : '' }}" name="hak_akses" placeholder="Nama Hak Akses" value="{{ $row->hak_akses }}">
                                                            @if($errors->has('hak_akses'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('hak_akses') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="modalCreate" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Insert Level</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <form method="POST" action="{{ url('level/post') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <input type="text" class="form-control {{ $errors->has('hak_akses') ? 'is-invalid' : '' }}" name="hak_akses" placeholder="Nama Hak Akses">
                                @if($errors->has('hak_akses'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('hak_akses') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection