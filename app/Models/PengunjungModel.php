<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table            = 'pengunjung'; // Sesuaikan dengan nama tabel
    protected $primaryKey       = 'id'; // Primary key sesuai tabel 
    protected $allowedFields    = [
        'nama', 
        'jk', 
        'jenis', 
        'patu', 
        'saran', 
        'tgl'
    ];  
    protected $useTimestamps = false;  
}
