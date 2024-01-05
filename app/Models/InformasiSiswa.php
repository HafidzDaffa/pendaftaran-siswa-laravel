<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'ttl',
        'jenis_kelamin',
        'alamat',
        'nama_ortu',
        'no_hp',
        'pekerjaan_ortu',
        'penghasilan_ortu',
        'kepemilikan_rumah',
        'pas_foto',
        'akta_kelahiran',
        'kartu_keluarga',
        'ktp_ortu',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
