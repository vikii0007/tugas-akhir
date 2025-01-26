<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table            = 'anggota'; // Nama tabel di database
    protected $primaryKey       = 'id_anggota'; // Primary key sesuai dengan tabel 
    protected $allowedFields    = [
        'nama',
        'alamat',
        'jk',
        'agama',
        'tempat_lahir',
        'tgl_lahir',
        'tgl_daftar',
    ];

    // Dates
    protected $useTimestamps = false;
}
