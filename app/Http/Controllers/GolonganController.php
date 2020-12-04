<?php

namespace App\Http\Controllers;

use App\GolonganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GolonganController extends Controller
{
    public function index(){
        $data = DB::table('tb_golongan')->get();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('golongan/index', [
                'data' => $data
            ]);
        }
    }

    public function create(){
        return view('golongan/create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_golongan'  => 'required',
            'gaji_pokok'     => 'required',
        ]);

        GolonganModel::create([
            'nama_golongan'     => $request->nama_golongan,
            'nilai'             => $request->gaji_pokok,
        ]);

        return redirect('/golongan/tambah')->with('msg_success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = GolonganModel::find($id);

        return view('golongan/edit', [
            'data' => $data
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'nama_golongan'  => 'required',
            'gaji_pokok'     => 'required',
        ]);

        $data = GolonganModel::find($id);
        
        $data->nama_golongan = $request->nama_golongan;
        $data->nilai         = $request->gaji_pokok;
        $data->save();

        return redirect('/golongan/edit/'.$id)->with('msg_success', 'Data berhasil diupdate!');
    }

    public function delete($id){
        $data = GolonganModel::find($id);
        $data->delete();

        return redirect('/golongan')->with('msg_success', 'Data berhasil dihapus!');
    }
}
