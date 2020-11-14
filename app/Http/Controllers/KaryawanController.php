<?php

namespace App\Http\Controllers;

use App\KaryawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class KaryawanController extends Controller
{
    public function index(){
        $data = KaryawanModel::all();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('karyawan/index', [
                'data' => $data
            ]);
        }
    }

    public function create(){
        return view('karyawan/create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nik'               => 'required|numeric|unique:tb_karyawan,NIK',
            'nama'              => 'required',
            'tempat'            => 'required',
            'tgl_lahir'         => 'required|date',
            'jenis_kelamin'     => 'required',
            'telp'              => 'required|numeric',
            'golongan'          => 'required',
            'jabatan'           => 'required',
            'pendidikan'        => 'required',
            'agama'             => 'required',
            'status_pernikahan' => 'required',
            'status_kerja'      => 'required',
            'alamat'            => 'required',
            'file'              => 'max:1024|mimes:jpg,jpeg'
        ]);

        try {
            //code...
            $countKaryawan = DB::table('tb_karyawan')->count();

            //File Upload
            $file    = $request->file('file');
            $newName = null;

            if($file != null){
                $ext     = $file->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;

                $file->move('assets/img/foto', $newName);
            }

            KaryawanModel::create([
                'NIK'               => $request->nik,
                'nama_karyawan'     => $request->nama,
                'tempat_lahir'      => $request->tempat,
                'tanggal_lahir'     => Carbon::parse($request->tgl_lahir)->format('Y-m-d'),
                'jenis_kelamin'     => $request->jenis_kelamin, 
                'agama'             => $request->agama,
                'jabatan'           => $request->jabatan,
                'golongan'          => $request->golongan,
                'pendidikan'        => $request->pendidikan,
                'no_telp'           => $request->telp,
                'alamat'            => $request->alamat,
                'status_pernikahan' => $request->status_pernikahan,
                'status_kerja'      => $request->status_kerja,
                'foto'              => $newName,
                'id_user'           => Session::get('id_user'),
                'id_sidik_jari'     => str_pad($countKaryawan+1, 3, "0", STR_PAD_LEFT)
            ]);

            return redirect('/karyawan/tambah')->with('msg_success', 'Data berhasil ditambahkan!');

        } catch (\Exception $th) {
            //throw $th;
            return redirect('/karyawan/tambah')->with('msg_error', 'Gagal menyimpan data!');
        }
    }

    public function edit($id){
        $data = KaryawanModel::find($id);

        return view('karyawan/edit', [
            'data' => $data
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'nik'               => 'required|numeric',
            'nama'              => 'required',
            'tempat'            => 'required',
            'tgl_lahir'         => 'required|date',
            'jenis_kelamin'     => 'required',
            'telp'              => 'required|numeric',
            'jabatan'           => 'required',
            'golongan'          => 'required',
            'pendidikan'        => 'required',
            'agama'             => 'required',
            'status_pernikahan' => 'required',
            'status_kerja'      => 'required',
            'alamat'            => 'required',
            'file'              => 'max:1024|mimes:jpg,jpeg'
        ]);
        
        try {
            //Get data by id
            $data    = KaryawanModel::find($id);
            $findNIK = DB::table('tb_karyawan')
                       ->where('NIK','=',$request->nik)
                       ->where('id_sidik_jari','!=',$data->id_sidik_jari)
                       ->count();
            
            if($findNIK > 0){
                return redirect('/karyawan/edit/'.$data->NIK)->with('msg_error', 'NIK sudah digunakan!');
            }

            if($data->foto == ''){
                //File Upload
                $file    = $request->file('file');
                $newName = null;

                if($file != null){
                    $ext     = $file->getClientOriginalExtension();
                    $newName = rand(100000,1001238912).".".$ext;

                    $file->move('assets/img/foto', $newName);
                }
                
                $data->NIK                  = $request->nik;
                $data->nama_karyawan        = $request->nama;
                $data->tempat_lahir         = $request->tempat;
                $data->tanggal_lahir        = Carbon::parse($request->tgl_lahir)->format('Y-m-d');
                $data->jenis_kelamin        = $request->jenis_kelamin;
                $data->agama                = $request->agama;
                $data->golongan             = $request->golongan;
                $data->jabatan              = $request->jabatan;
                $data->pendidikan           = $request->pendidikan;
                $data->no_telp              = $request->telp;
                $data->alamat               = $request->alamat;
                $data->status_pernikahan    = $request->status_pernikahan;
                $data->status_kerja         = $request->status_kerja;
                $data->foto                 = $newName;
                $data->save();

            }else{

                $data->NIK                  = $request->nik;
                $data->nama_karyawan        = $request->nama;
                $data->tempat_lahir         = $request->tempat;
                $data->tanggal_lahir        = Carbon::parse($request->tgl_lahir)->format('Y-m-d');
                $data->jenis_kelamin        = $request->jenis_kelamin;
                $data->agama                = $request->agama;
                $data->golongan             = $request->golongan;
                $data->jabatan              = $request->jabatan;
                $data->pendidikan           = $request->pendidikan;
                $data->no_telp              = $request->telp;
                $data->alamat               = $request->alamat;
                $data->status_pernikahan    = $request->status_pernikahan;
                $data->status_kerja         = $request->status_kerja;
                $data->save();
            }

            return redirect('/karyawan/edit/'.$id)->with('msg_success', 'Data berhasil diupdate!');

        } catch (\Exception $th) {
            //throw $th;
            return redirect('/karyawan/edit')->with('msg_error', 'Gagal menyimpan data!');
        }
    }

    public function delete($id){
        $data = KaryawanModel::find($id);
        $data->delete();

        return redirect('/karyawan')->with('msg_success', 'Data berhasil dihapus!');
    }

    public function detail($id){
        $data = KaryawanModel::find($id);
        
        return view('karyawan/detail', [
            'data' => $data
        ]);
    }
}
