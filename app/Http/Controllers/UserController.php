<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        $user = DB::table('tb_user')
                ->join('tb_level', 'tb_user.level_akses', '=', 'tb_level.id_level')
                ->select('tb_user.id_user', 'tb_user.nama_user', 'tb_user.username', 'tb_level.hak_akses', 'tb_user.status')
                ->get();

        if(!Session::get('status')){
            return redirect('/')->with('warning_login', 'Silahkan login terlebih dahulu!');
        }else{
            return view('user/index', [
                'user' => $user
            ]);
        }
    }

    public function create(){
        $level = DB::table('tb_level')->get();
    
        return view('user/create', [
            'level' => $level
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama'      => 'required',
            'username'  => 'required',
            'password'  => 'required|min:6|max:12',
            'level'     => 'required'
        ]);

        UserModel::create([
            'nama_user'     => $request->nama,
            'username'      => $request->username,
            'password'      => md5($request->password),
            'level_akses'   => $request->level,
            'status'        => 1
        ]);

        return redirect('/user/tambah')->with('msg_success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $user = UserModel::find($id);
        $level = DB::table('tb_level')->get();

        return view('user/edit', [
            'user'  => $user,
            'level' => $level
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'nama'      => 'required',
            'username'  => 'required',
            'level'     => 'required'
        ]);

        $user = UserModel::find($id);
        
        $user->nama_user    = $request->nama;
        $user->username     = $request->username;
        $user->level_akses  = $request->level;
        $user->save();

        return redirect('/user/edit/'.$id)->with('msg_success', 'Data berhasil diupdate!');
    }

    public function delete($id){
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user')->with('msg_success', 'Data berhasil dihapus!');
    }
}
