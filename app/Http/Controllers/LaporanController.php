<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    public function index(){
        $data = DB::table('tb_gaji')
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_tunjangan', 'tb_gaji.tunjangan', '=', 'tb_tunjangan.id_tunjangan')
                ->get();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('laporan/index', [
                'data' => $data
            ]);
        }
    }
}
