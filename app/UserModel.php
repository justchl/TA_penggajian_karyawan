<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $timestamps = false;

    protected $table = 'tb_user';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user', 
        'username', 
        'password', 
        'level_akses', 
        'status'
    ];
}