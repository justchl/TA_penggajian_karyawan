<?php

namespace App\Http\Controllers;

use App\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LevelController extends Controller
{
    public function index(){
        $data = LevelModel::all();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('level/index', [
                'data' => $data
            ]);
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'hak_akses'      => 'required'
        ]);

        LevelModel::create([
            'hak_akses' => $request->hak_akses
        ]);

        return redirect('/level')->with('msg_success', 'Data berhasil ditambahkan!');
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'hak_akses'      => 'required'
        ]);

        $data = LevelModel::find($id);

        $data->hak_akses  = $request->hak_akses;
        $data->save();

        return redirect('/level')->with('msg_success', 'Data berhasil diupdate!');
    }

    public function delete($id){
        $data = LevelModel::find($id);
        $data->delete();

        return redirect('/level')->with('msg_success', 'Data berhasil dihapus!');
    }
}
