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
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Obtober',
            'November',
            'Desember'
        ];

        $dataBulan = [];

        $data = DB::table('tb_gaji')
                ->select(DB::raw('sum(total) as total_gaji, MONTH(tanggal) as bulan'))
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_tunjangan', 'tb_gaji.tunjangan', '=', 'tb_tunjangan.id_tunjangan')
                ->groupBy('bulan')
                ->get();

        foreach ($data as $key => $value) {
            # code...
            $value->bulan_label = $bulan[$value->bulan-1];
            $dataBulan[] = $value;
        }
        
        return response()->json(array(
            'success' => true,
            'data'    => $dataBulan,
        ));
    }
}
