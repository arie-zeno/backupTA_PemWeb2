<?php

namespace App\Imports;

use App\Models\Pekerjaan;
use Maatwebsite\Excel\Concerns\ToModel;

class PekerjaanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pekerjaan([
            'nim'     => $row[0],
            'kategori_pekerjaan'     => $row[1],
            'nama_pekerjaan'     => $row[2],
            'tempat_pekerjaan'     => $row[3],
            'tanggal_pekerjaan'     => $row[4].'-'.$row[5].'-'.$row[6],
            'gaji'     => $row[7],
            'relevansi_pekerjaan'     => $row[8]
        ]);
    }
}
