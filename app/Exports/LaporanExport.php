<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Peminjaman::where('status', '=', 'accepted')->select('id','barang_id','driver_id','banyaknya','mulai','peminjam')->get();
    }
    public function headings(): array
    {
        return [
            'No', 'Nama Kendaraan', 'driver','Jumlah','waktu','peminjam'
        ];
    }
}
