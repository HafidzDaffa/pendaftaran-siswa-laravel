<?php

namespace App\Exports;
use App\Models\InformasiSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class InformasiSiswaExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $informasi_siswa = InformasiSiswa::latest()->get();

        $data = $informasi_siswa->map(function($val){
            return [
                'nama_lengkap' => $val->nama_lengkap,
                'ttl' => $val->ttl,
                'jenis_kelamin' => $val->jenis_kelamin,
                'alamat' => $val->alamat,
                'nama_ortu' => $val->nama_ortu,
                'no_hp' => $val->no_hp,
                'pekerjaan_ortu' => $val->pekerjaan_ortu,
                'penghasilan_ortu' => $val->penghasilan_ortu,
                'kepemilikan_rumah' => $val->kepemilikan_rumah,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nama lengkap',
            'Tempat tanggal lahir',
            'Jenis kelamin',
            'Alamat',
            'Nama orangtua',
            'No hp',
            'Pekerjaan orangtua',
            'Penghasilan orangtua',
            'Kepemilikan rumah',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
