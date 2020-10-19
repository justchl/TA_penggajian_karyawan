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
        $dataGaji = GajiModel::all();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('gaji/index', [
                'dataGaji' => $dataGaji
            ]);
        }
    }

    public function create(){
        $dataKaryawan = DB::table('tb_karyawan')->get();

        return view('gaji/create', [
            'dataKaryawan' => $dataKaryawan
        ]);
    }
}