<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GajiModel extends Model
{
    public $timestamps = false;

    protected $table = 'tb_gaji';

    protected $primaryKey = 'id_gaji';

    protected $fillable = [
        'NIK',
        'tunjangan',
        'tanggal',
        'gaji_pokok',
        'tunjangan_pendidikan',
        'tunjangan_struktural',
        'tambahan',
        'potongan',
        'total'
    ];
}
