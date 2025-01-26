<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PengunjungModel;
use App\Models\BukuModel;

class Pengunjung extends BaseController
{
    public function index()
    {
        // Instansiasi model
        $pengunjungModel = new PengunjungModel();

        // Total pengunjung hari ini
        $totalHariIni = $pengunjungModel
            ->where('DATE(tgl)', date('Y-m-d'))
            ->countAllResults();

        // Total pengunjung bulan ini
        $totalBulanIni = $pengunjungModel
            ->where('MONTH(tgl)', date('m'))
            ->where('YEAR(tgl)', date('Y'))
            ->countAllResults();

        // Nomor pengunjung ke (menggunakan total pengunjung hari ini)
        $pengunjungKe = $totalHariIni + 1;

        // Kirim data ke view
        $data = [
            'totalHariIni' => $totalHariIni,
            'totalBulanIni' => $totalBulanIni,
            'pengunjungKe' => $pengunjungKe,
        ];

        return view('pengunjung/beranda', $data);
    }

    public function tambah()
    {
        // Instansiasi model
        $pengunjungModel = new PengunjungModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|max_length[55]',
            'jk' => 'required|in_list[L,P]',
            'jenis' => 'required|in_list[Dosen,Mahasiswa]',
            'patu' => 'required|max_length[255]',
            'saran' => 'permit_empty|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $pengunjungModel->save([
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'jenis' => $this->request->getPost('jenis'),
            'patu' => $this->request->getPost('patu'),
            'saran' => $this->request->getPost('saran'),
            'tgl' => date('Y-m-d H:i:s'), // Waktu sekarang
        ]);

        // Redirect dengan pesan sukses
        return redirect()->to(base_url('/'))->with('success', 'Data pengunjung berhasil ditambahkan.');
    }
    public function profil()
    {
        // Instansiasi model
        $pengunjungModel = new PengunjungModel();

        // Total pengunjung hari ini
        $totalHariIni = $pengunjungModel
            ->where('DATE(tgl)', date('Y-m-d'))
            ->countAllResults();

        // Total pengunjung bulan ini
        $totalBulanIni = $pengunjungModel
            ->where('MONTH(tgl)', date('m'))
            ->where('YEAR(tgl)', date('Y'))
            ->countAllResults();

        // Nomor pengunjung ke (menggunakan total pengunjung hari ini)
        $pengunjungKe = $totalHariIni + 1;

        // Kirim data ke view
        $data = [
            'totalHariIni' => $totalHariIni,
            'totalBulanIni' => $totalBulanIni,
            'pengunjungKe' => $pengunjungKe,
        ];

        return view('pengunjung/profil', $data);
    }

    public function cariBuku()
    {
        // Load model
        $bukuModel = new BukuModel();

        // Ambil semua data buku dari database
        $dataBuku = $bukuModel->findAll();

        // Instansiasi model
        $pengunjungModel = new PengunjungModel();

        // Total pengunjung hari ini
        $totalHariIni = $pengunjungModel
            ->where('DATE(tgl)', date('Y-m-d'))
            ->countAllResults();

        // Total pengunjung bulan ini
        $totalBulanIni = $pengunjungModel
            ->where('MONTH(tgl)', date('m'))
            ->where('YEAR(tgl)', date('Y'))
            ->countAllResults();

        // Nomor pengunjung ke (menggunakan total pengunjung hari ini)
        $pengunjungKe = $totalHariIni + 1;

        // Kirim data ke view
        $data = [
            'totalHariIni' => $totalHariIni,
            'totalBulanIni' => $totalBulanIni,
            'pengunjungKe' => $pengunjungKe,
            'dataBuku' => $dataBuku
        ];

        // Kirim data ke view
        return view('pengunjung/cariBuku', $data);
    }
}
