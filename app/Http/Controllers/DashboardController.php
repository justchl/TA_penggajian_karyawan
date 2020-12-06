<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $dateNow = Carbon::now();
        $formated = Carbon::parse($dateNow)->format('m');
        //Data Karyawan
        $karyawan = DB::table('tb_karyawan')->count();
        //Data User
        $user = DB::table('tb_user')->count();
        //Data Absensi
        $absensi = DB::table('tb_absensi')->count();
        //Total Expense Monthly
        $summary = DB::table('tb_gaji')
                ->select(DB::raw('sum(tb_gaji.total) as grand_total'))
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->whereMonth('tanggal', $formated)
                ->whereYear('tanggal', $dateNow->format('Y'))
                ->first();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('dashboard/index',[
                'countKaryawan' => $karyawan,
                'countUser'     => $user,
                'countAbsensi'  => $absensi,
                'expense'       => $summary->grand_total
            ]);
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
