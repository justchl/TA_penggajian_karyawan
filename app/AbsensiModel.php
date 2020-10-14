<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    public $timestamps = false;

    protected $table = 'tb_absensi';

    protected $primaryKey = 'id_absensi';

    protected $fillable = [
        'NIK',
        'status_kehadiran',
        'tanggal',
        'masuk',
        'pulang',
        'keterangan'
    ];
}
