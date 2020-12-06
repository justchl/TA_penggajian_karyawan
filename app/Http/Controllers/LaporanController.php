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
                ->whereMonth('tanggal', $formated)
                ->whereYear('tanggal', $dateNow->format('Y'))
                ->get();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('laporan/index', [
                'data'  => $data,
                'bulan' => $dateNow->format('m'),
                'tahun' => $dateNow->format('Y')
            ]);
        }
    }

    public function detail($id){
        $data = DB::table('tb_gaji')
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_golongan','tb_karyawan.golongan','=','tb_golongan.id_golongan')
                ->where('tb_gaji.id_gaji', $id)
                ->get();
        
        return view('laporan/detail', [
            'data' => $data
        ]);
    }

    public function printReport(Request $request){
        $month = $request->query('bulan');
        $year  = $request->query('tahun');

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

        $data = DB::table('tb_gaji')
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_golongan','tb_karyawan.golongan','=','tb_golongan.id_golongan')
                ->whereMonth('tanggal', $month)
                ->whereYear('tanggal', $year)
                ->get();

        $summary = DB::table('tb_gaji')
                ->select(DB::raw('sum(tb_gaji.gaji_pokok) as total_gaji_pokok, sum(tb_gaji.total) as grand_total, sum(tb_gaji.tunjangan_makan) as tunjangan_makan, sum(tb_gaji.tunjangan_pendidikan) as tunjangan_pendidikan, sum(tb_gaji.tunjangan_struktural) as tunjangan_jabatan, sum(tb_gaji.potongan) as potongan, sum(tb_gaji.lembur) as lembur, sum(tb_gaji.tambahan) as tambahan'))
                ->join('tb_karyawan', 'tb_gaji.NIK', '=', 'tb_karyawan.NIK')
                ->join('tb_golongan','tb_karyawan.golongan','=','tb_golongan.id_golongan')
                ->whereMonth('tanggal', $month)
                ->whereYear('tanggal', $year)
                ->first();
        
        return view('laporan/final_report', [
            'data'  => $data,
            'bulan' => $bulan[$month-1],
            'tahun' => $year,
            'totalGapok' => $summary->total_gaji_pokok,
            'grandTotal' => $summary->grand_total,
            'totalTunjMakan' => $summary->tunjangan_makan,
            'totalTunjPendidikan' => $summary->tunjangan_pendidikan,
            'totalTunjJabatan' => $summary->tunjangan_jabatan,
            'totalPotongan' => $summary->potongan,
            'totalLembur' => $summary->lembur,
            'totalTambahan' => $summary->tambahan
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
