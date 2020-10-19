<?php

namespace App\Http\Controllers;

use App\AbsensiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

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

    public function store(Request $request){
        $this->validate($request, [
            'nik'               => 'required',
            'tanggal'           => 'required|date',
            'masuk'             => 'required',
            'pulang'            => 'required',
            'status_kehadiran'  => 'required',
            'keterangan'        => 'required'
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
}