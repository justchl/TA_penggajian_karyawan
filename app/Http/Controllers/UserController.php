<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $user = DB::table('tb_user')
                ->join('tb_level', 'tb_user.level_akses', '=', 'tb_level.id_level')
                ->select('tb_user.id_user', 'tb_user.nama_user', 'tb_user.username', 'tb_level.hak_akses', 'tb_user.status')
                ->get();

        return view('user/index', [
            'user' => $user
        ]);
    }

    public function create(){
        $level = DB::table('tb_level')->get();
        
        return view('user/create', [
            'level' => $level
        ]);
    }
}
