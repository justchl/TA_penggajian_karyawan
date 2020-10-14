<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    public $timestamps = false;

    protected $table = 'tb_level';

    protected $primaryKey = 'id_level';

    protected $fillable = [
        'hak_akses'
    ];
}
