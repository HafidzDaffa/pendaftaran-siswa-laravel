<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = User::where('role', '=', 'wali_murid')->latest()->get();

        $data = $user->map(function($val){
            return [
                'nama' => $val->nama,
                'email' => $val->email,
                'no_wa' => $val->no_wa,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'nama',
            'email',
            'no_wa',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
