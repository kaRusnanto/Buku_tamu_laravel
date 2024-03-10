<?php

namespace App\Exports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\FromCollection;

class TamuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tamu::all();
    }

    public function headings(): array
    {
        return [
            'Nama', 'Gender', 'No Hp', 'Alamat'
        ];
    }
}
