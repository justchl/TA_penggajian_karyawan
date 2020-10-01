<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';

    protected $fillable = [
    	'nama_user', 'username', 'level_akses', 'status'
    ];
}