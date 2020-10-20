<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TunjanganModel extends Model
{
    public $timestamps = false;

    protected $table = 'tb_tunjangan';

    protected $primaryKey = 'id_tunjangan';

    protected $fillable = [
        'nama_tunjangan',
        'nilai_tunjangan'
    ];
}
