<?php

namespace App\Http\Controllers;

use App\KaryawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    public function index(){
        $data = KaryawanModel::all();

        return view('karyawan/index', [
            'data' => $data
        ]);
    }

    public function create(){
        return view('karyawan/create');
    }

    public function store(Request $request){
        $this->validate($request, [
            // 'nik'               => 'required|numeric',
            // 'nama'              => 'required',
            // 'tempat'            => 'required',
            // 'tgl_lahir'         => 'required|date',
            // 'jenis_kelamin'     => 'required',
            // 'telp'              => 'required|numeric',
            // 'jabatan'           => 'required',
            // 'pendidikan'        => 'required',
            // 'agama'             => 'required',
            // 'status_pernikahan' => 'required',
            // 'status_kerja'      => 'required',
            // 'alamat'            => 'required',
            'foto'              => 'required|max:1024'
        ]);

        //File Upload
        $file    = $request->file('foto');
        $ext     = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;

        $file->move('assets/img/foto', $newName);

        KaryawanModel::create([
            'NIK'               => $request->nik,
            'nama_karyawan'     => $request->nama,
            'tempat_lahir'      => $request->tempat,
            'tanggal_lahir'     => $request->tgl_lahir, 
            'jenis_kelamin'     => $request->jenis_kelamin, 
            'agama'             => $request->agama,
            'jabatan'           => $request->jabatan,
            'pendidikan'        => $request->pendidikan,
            'no_telp'           => $request->no_telp,
            'alamat'            => $request->alamat,
            'status_pernikahan' => $request->status_pernikahan,
            'status_kerja'      => $request->status_kerja,
            'foto'              => $newName,
            'id_user'           => Session::get('id_user')
        ]);

        return redirect('/karyawan/tambah')->with('msg_success', 'Data berhasil ditambahkan!');
    }
}
