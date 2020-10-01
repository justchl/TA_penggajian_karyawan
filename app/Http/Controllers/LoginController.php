<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login/index');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = md5($request->password);

        $data = UserModel::where('username', $username)->first();
        
        if($data){
            if($username == $data->username && $password == $data->password){
                Session::put('nama_user', $data->nama_user);
                Session::put('username', $data->username);
                Session::put('level', $data->level_akses);
                Session::put('status', TRUE);

                return redirect('/dashboard');
            }else{
                return redirect('/')->with('error_login', 'Username atau password salah!');
            }
        }else{
            return redirect('/')->with('error_login', 'Username tidak ditemukan!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
