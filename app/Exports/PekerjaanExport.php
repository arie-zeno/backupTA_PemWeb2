<?php

namespace App\Exports;

use App\Models\Pekerjaan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PekerjaanExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('pekerjaans')
            ->join('biodatas', 'biodatas.nim', '=', 'pekerjaans.nim')
            ->select('biodatas.name', 'biodatas.ipk', 'pekerjaans.*')
            ->get();
    }
    public function headings() : array
    {
        return ["Nama", "IPK","id", "NIM", "Kategori", "Pekerjaan", "Alamat Pekerjaan", "Tgl Bekerja", "Gaji", "Relevansi"];
    }
}
