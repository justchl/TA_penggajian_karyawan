<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('dashboard/index');
        }
    }

    public function getChartGaji(){
        $bulan = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Obtober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $data = DB::table('tb_gaji')
                ->select(DB::raw('sum(total) as total_gaji, DATE_FORMAT(tanggal, "%b") as bulan'))
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_tunjangan', 'tb_gaji.tunjangan', '=', 'tb_tunjangan.id_tunjangan')
                ->groupBy('bulan')
                ->get();
        
        return response()->json(array(
            'success' => true,
            'data'    => $data,
            'bulan'   => $bulan
        ));
    }
}
