<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengunjung extends BaseController
{
    public function index()
    {
        return view('pengunjung/beranda');//
    }

    public function profil()
    {
        return view('pengunjung/profil');
    }

    public function cariBuku(){
        return view('pengunjung/cariBuku');
    }
}
