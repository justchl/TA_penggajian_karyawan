<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function index(){
        $dateNow = Carbon::now();
        $formated = Carbon::parse($dateNow)->format('m');

        $data = DB::table('tb_gaji')
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_tunjangan', 'tb_gaji.tunjangan', '=', 'tb_tunjangan.id_tunjangan')
                ->whereMonth('tanggal', $formated)
                ->get();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('laporan/index', [
                'data' => $data
            ]);
        }
    }

    public function detail($id){
        $data = DB::table('tb_gaji')
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_tunjangan', 'tb_gaji.tunjangan', '=', 'tb_tunjangan.id_tunjangan')
                ->where('tb_gaji.id_gaji', $id)
                ->get();
        
        return view('laporan/detail', [
            'data' => $data
        ]);
    }

    public function printReport(){
        $dateNow = Carbon::now();
        $formated = Carbon::parse($dateNow)->format('m');

        $data = DB::table('tb_gaji')
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_tunjangan', 'tb_gaji.tunjangan', '=', 'tb_tunjangan.id_tunjangan')
                ->whereMonth('tanggal', $formated)
                ->get();
        
        return view('laporan/final_report', [
            'data' => $data
        ]);
    }

    public function filterData(Request $request){

        $month = $request->month;
        $year  = $request->year;

        $data = DB::table('tb_gaji')
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_tunjangan', 'tb_gaji.tunjangan', '=', 'tb_tunjangan.id_tunjangan')
                ->whereMonth('tanggal', $month)
                ->whereYear('tanggal', $year)
                ->get();
        
        return response()->json(array(
            'success' => true,
            'data'    => $data
        ));
    }
}
