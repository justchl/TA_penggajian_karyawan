<?php

namespace App\Http\Controllers;

use App\AbsensiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AbsensiController extends Controller
{
    public function index(){
        $data = DB::table('tb_karyawan')
                ->join('tb_absensi', 'tb_karyawan.NIK', '=', 'tb_absensi.NIK')
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
        $karyawan = DB::table('tb_karyawan')->get();

        return view('absensi/create', [
            'karyawan' => $karyawan
        ]);
    }
}
