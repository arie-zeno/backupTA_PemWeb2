<?php

namespace App\Imports;

use App\Models\Biodata;
use Maatwebsite\Excel\Concerns\ToModel;

class BiodataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Biodata([
            'nim'     => $row[0],
            'name'     => $row[1],
            'user_id'     => $row[2],
            'thnMasuk'     => $row[3],
            'thnLulus'     => $row[4],
            'tempatLahir'     => $row[5],
            'tglLahir'     => $row[6],
            'jk'     => $row[7],
            'agama'     => $row[8],
            'kawin'     => $row[9],
            'pekerjaan'     => $row[10],
        ]);
    }
}
