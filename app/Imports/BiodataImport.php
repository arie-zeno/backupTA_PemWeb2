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
            'kontak' => $row[1],
            'name'     => $row[2],
            'user_id'     => $row[3],
            'thnMasuk'     => $row[4],
            'thnLulus'     => $row[5],
            'ipk'     => $row[6],
            'tempatLahir'     => $row[7],
            'tglLahir'     => $row[8],
            'jk'     => $row[9],
            'agama'     => $row[10],
            'kawin'     => $row[11],
            'pekerjaan'     => $row[12],
        ]);
    }
}
