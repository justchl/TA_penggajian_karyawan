<?php

namespace App\Http\Controllers;

use App\AbsensiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Imports\AbsensiImport;
use Excel;

class AbsensiController extends Controller
{
    public function index(){
        $data = DB::table('tb_absensi')
                ->join('tb_karyawan', 'tb_karyawan.NIK', '=', 'tb_absensi.NIK')
                ->get();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('absensi/index', [
                'data' => $data
            ]);
        }
    }

    public function create(){
        $dataKaryawan = DB::table('tb_karyawan')->get();

        return view('absensi/create', [
            'dataKaryawan' => $dataKaryawan
        ]);
    }

    public function uploadFile(Request $request){
        try {
            //code...
            $this->validate($request, [
                'file' => 'required|mimes:xls,xlxs'
            ]);
    
            if ($request->hasFile('file')) {
                $file = $request->file('file'); //GET FILE
                Excel::import(new AbsensiImport, $file); //IMPORT FILE 
                
                return redirect('/absensi')->with(['msg_success' => 'File berhasil diupload!']);
            }
            return redirect('/absensi')->with(['msg_error' => 'Silahkan upload file terlebih dahulu!']);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/absensi')->with('msg_error', 'Gagal import data!');
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'nik'               => 'required',
            'tanggal'           => 'required|date',
            'masuk'             => 'required',
            'pulang'            => 'required',
            'status_kehadiran'  => 'required'
        ]);

        AbsensiModel::create([
            'NIK'               => $request->nik,
            'status_kehadiran'  => $request->status_kehadiran,
            'tanggal'           => Carbon::parse($request->tanggal)->format('Y-m-d'),
            'masuk'             => $request->masuk,
            'pulang'            => $request->pulang,
            'keterangan'        => $request->keterangan
        ]);

        return redirect('/absensi/tambah')->with('msg_success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $row = AbsensiModel::find($id);
        $data = DB::table('tb_karyawan')->get();

        return view('absensi/edit', [
            'row'  => $row,
            'dataKaryawan' => $data
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'nik'               => 'required',
            'tanggal'           => 'required|date',
            'masuk'             => 'required',
            'pulang'            => 'required',
            'status_kehadiran'  => 'required',
            'keterangan'        => 'required'
        ]);

        $data = AbsensiModel::find($id);
        
        $data->nik              = $request->nik;
        $data->tanggal          = Carbon::parse($request->tanggal)->format('Y-m-d');
        $data->masuk            = $request->masuk;
        $data->pulang           = $request->pulang;
        $data->status_kehadiran = $request->status_kehadiran;
        $data->keterangan       = $request->keterangan;
        $data->save();

        return redirect('/absensi/edit/'.$id)->with('msg_success', 'Data berhasil diupdate!');
    }

    public function delete($id){
        $data = AbsensiModel::find($id);
        $data->delete();

        return redirect('/absensi')->with('msg_success', 'Data berhasil dihapus!');
    }
}
