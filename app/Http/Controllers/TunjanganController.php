<?php

namespace App\Http\Controllers;

use App\TunjanganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TunjanganController extends Controller
{
    public function index(){
        $data = TunjanganModel::all();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('tunjangan/index', [
                'data' => $data
            ]);
        }
    }

    public function create(){
        $data = DB::table('tb_karyawan')->get();

        return view('tunjangan/create', [
            'data' => $data
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_tunjangan'    => 'required',
            'nilai_tunjangan'   => 'required|numeric'
        ]);

        TunjanganModel::create([
            'nama_tunjangan'    => $request->nama_tunjangan,
            'nilai_tunjangan'   => $request->nilai_tunjangan
        ]);

        return redirect('/tunjangan/tambah')->with('msg_success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $row = TunjanganModel::find($id);
        $data = DB::table('tb_karyawan')->get();

        return view('tunjangan/edit', [
            'row'  => $row,
            'data' => $data
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'nama_tunjangan'    => 'required',
            'nilai_tunjangan'   => 'required|numeric'
        ]);

        $data = TunjanganModel::find($id);
        
        $data->nama_tunjangan   = $request->nama_tunjangan;
        $data->nilai_tunjangan  = $request->nilai_tunjangan;
        $data->save();

        return redirect('/tunjangan/edit/'.$id)->with('msg_success', 'Data berhasil diupdate!');
    }

    public function delete($id){
        $data = TunjanganModel::find($id);
        $data->delete();

        return redirect('/tunjangan')->with('msg_success', 'Data berhasil dihapus!');
    }
}
