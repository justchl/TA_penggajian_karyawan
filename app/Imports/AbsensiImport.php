<?php

namespace App\Imports;

use App\AbsensiModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

class AbsensiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AbsensiModel([
            'NIK'               => str_replace("'","", $row[0]),
            'status_kehadiran'  => $row[1],
            'tanggal'           => $row[2] == '' ? null : Carbon::parse(str_replace("'", "", $row[2]))->format('Y-m-d'),
            'masuk'             => $row[3] == '' ? '00:00:00' : str_replace("'", "", $row[3]),
            'pulang'            => $row[4] == '' ? '00:00:00' : str_replace("'", "", $row[4]),
            'keterangan'        => $row[5]
        ]);
    }
}
