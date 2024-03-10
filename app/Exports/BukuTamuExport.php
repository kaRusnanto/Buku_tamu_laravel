<?php

namespace App\Exports;

use App\Models\Buku_tamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class BukuTamuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_buku_tamu = DB::table('buku_tamu') //join tabel dengan Query Builder Laravel
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->select('buku_tamu.*', 'tamu.nama AS tam', 'jabatan.nama AS tan')->get();
        return $ar_buku_tamu;
    }

    public function headings(): array
    {
        return [
            'Nama Tamu', 'Jabatan', 'Tgl Bertemu', 'Keperluan'
        ];
    }
}
