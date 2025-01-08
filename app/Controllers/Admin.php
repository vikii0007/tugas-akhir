<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('Admin/dashboard');
    }
    public function validateAccessCode()
    {
        // Simpan kode akses yang valid (bisa dipindahkan ke file konfigurasi atau database)
        $validAccessCodes = [
            '123456', // Kode akses 1
        ];

        // Ambil kode akses dari input pengguna
        $inputAccessCode = $this->request->getPost('access_code');

        // Cek apakah kode akses yang dimasukkan valid
        if (in_array($inputAccessCode, $validAccessCodes)) {
            // Set session untuk menandai bahwa pengguna sudah memiliki akses
            session()->set('isLoggedIn', true);

            // Redirect ke halaman dashboard atau tujuan lainnya
            return redirect()->to('/admin/dashboard');
        } else {
            // Jika tidak valid, kirim pesan error dan kembalikan ke halaman login
            return redirect()->back()->with('error', 'Kode akses salah! Silakan coba lagi.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
