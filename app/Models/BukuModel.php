<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'buku'; // Nama tabel sesuai dengan database
    protected $primaryKey       = 'id_buku'; // Primary key sesuai dengan kolom tabel
    protected $allowedFields    = [
        'id_buku',
        'judul',
        'pengarang',
        'tahun_terbit',
        'isbn',
        'kategori',
        'deskripsi'
    ];
    protected $useTimestamps = false;
}
