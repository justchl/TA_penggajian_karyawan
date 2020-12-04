<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    public $timestamps = false;

    protected $table = 'tb_karyawan';

    protected $primaryKey = 'NIK';

    protected $fillable = [
        'NIK',
        'nama_karyawan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'jabatan',
        'golongan',
        'pendidikan',
        'no_telp',
        'alamat',
        'status_pernikahan',
        'status_kerja',
        'foto',
        'id_sidik_jari',
        'id_user'
    ];
}
