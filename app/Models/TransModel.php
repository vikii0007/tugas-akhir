<?php

namespace App\Models;

use CodeIgniter\Model;

class TransModel extends Model
{
    protected $table            = 'trans';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_buku', 'id_anggota', 'tgl_pinjam', 'tgl_kembali', 'ref', 'telat', 'denda', 'status'];

    // Dates
    protected $useTimestamps = false;
}
