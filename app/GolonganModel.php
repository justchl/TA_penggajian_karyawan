<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GolonganModel extends Model
{
    public $timestamps = false;

    protected $table = 'tb_golongan';

    protected $primaryKey = 'id_golongan';

    protected $fillable = [
        'nama_golongan',
        'nilai',
        'masa_kerja'
    ];
}
