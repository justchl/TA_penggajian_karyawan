<?php

namespace App\Http\Controllers;

use App\GajiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class GajiController extends Controller
{
    public function index(){
        $dataGaji = DB::table('tb_gaji')
                    ->join('tb_karyawan', 'tb_karyawan.NIK', '=', 'tb_gaji.NIK')
                    ->join('tb_tunjangan', 'tb_tunjangan.id_tunjangan', '=', 'tb_gaji.tunjangan')
                    ->get();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('gaji/index', [
                'dataGaji' => $dataGaji
            ]);
        }
    }

    public function getDataKaryawan($nik){
        $data = DB::table('tb_karyawan')
               ->where('NIK', $nik)
               ->get();
        
        return response()->json(array(
            'success' => true,
            'data'    => $data
        ));
    }

    public function getPotongan($nik){
        $data = DB::table('tb_absensi')
                ->where('NIK', $nik)
                ->whereRaw('HOUR(masuk) = 7')
                ->whereRaw('MINUTE(masuk) > 30')
                ->get();
        
        return response()->json(array(
            'success' => true,
            'data'    => $data
        ));
    }       

    public function create(){
        $dataKaryawan  = DB::table('tb_karyawan')->get();
        $dataTunjangan = DB::table('tb_tunjangan')->first();

        return view('gaji/create', [
            'dataKaryawan'   => $dataKaryawan,
            'dataTunjangan'  => $dataTunjangan
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'nik'                  => 'required',
            'gaji_pokok'           => 'required',
            'potongan'             => 'required',
            'tunjangan_pendidikan' => 'required',
            'tambahan'             => 'required',
        ]);

        GajiModel::create([
            'NIK'                  => $request->nik,
            'tunjangan'            => $request->id_tunjangan,
            'tanggal'              => Carbon::parse($request->tgl)->format('Y-m-d'),
            'gaji_pokok'           => $request->gaji_pokok,
            'tunjangan_pendidikan' => $request->tunjangan_pendidikan,
            'tambahan'             => $request->tambahan,
            'potongan'             => $request->potongan,
            'total'                => $request->total
        ]);

        return redirect('/gaji/tambah')->with('msg_success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $row = GajiModel::find($id);
        $dataKaryawan  = DB::table('tb_karyawan')->get();
        $dataTunjangan = DB::table('tb_tunjangan')->first();

        return view('gaji/edit', [
            'row'  => $row,
            'dataKaryawan'   => $dataKaryawan,
            'dataTunjangan'  => $dataTunjangan
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'nik'                  => 'required',
            'tgl'                  => 'required|date',
            'gaji_pokok'           => 'required',
            'potongan'             => 'required',
            'tunjangan_pendidikan' => 'required',
            'tambahan'             => 'required',
        ]);

        $data = GajiModel::find($id);
        
        $data->tanggal              = Carbon::parse($request->tgl)->format('Y-m-d');
        $data->gaji_pokok           = $request->gaji_pokok;
        $data->potongan             = $request->potongan;
        $data->tunjangan_pendidikan = $request->tunjangan_pendidikan;
        $data->tambahan             = $request->tambahan;
        $data->total                = $request->total;
        $data->save();

        return redirect('/gaji/edit/'.$id)->with('msg_success', 'Data berhasil diupdate!');
    }

    public function delete($id){
        $data = GajiModel::find($id);
        $data->delete();

        return redirect('/gaji')->with('msg_success', 'Data berhasil dihapus!');
    }
}
