<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PengunjungModel;
use App\Models\TransModel;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    protected $anggotaModel;
    protected $bukuModel;
    protected $pengunjungModel;
    protected $transModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
        $this->bukuModel = new BukuModel();
        $this->pengunjungModel = new PengunjungModel();
        $this->transModel = new TransModel();
    }
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('Admin/dashboard');
    }
    public function masuk()
    {
        // Ambil username dan password dari input pengguna
        $inputUsername = $this->request->getPost('username');
        $inputPassword = $this->request->getPost('password');

        // Load UserModel
        $userModel = new \App\Models\UserModel();

        // Cari pengguna berdasarkan username
        $user = $userModel->where('username', $inputUsername)->first();

        if ($user && password_verify($inputPassword, $user['password'])) {
            // Jika username dan password valid, set session login
            session()->set('isLoggedIn', true);
            session()->set('username', $user['username']); // Simpan username dalam session

            // Redirect ke halaman dashboard atau tujuan lainnya
            return redirect()->to('/admin/dashboard');
        } else {
            // Jika username atau password salah, kirim pesan error
            return redirect()->back()->with('error', 'Username atau password salah! Silakan coba lagi.');
        }
    }

    // data anggota 
    public function dataAnggota()
    {
        $anggotaModel = new \App\Models\AnggotaModel();

        // Ambil filter tanggal dari input
        $startDate = $this->request->getGet('start_date');
        $endDate   = $this->request->getGet('end_date');

        // Jika ada filter tanggal
        if ($startDate && $endDate) {
            $dataAnggota = $anggotaModel
                ->where('tgl_daftar >=', $startDate)
                ->where('tgl_daftar <=', $endDate)
                ->findAll();
        } else {
            // Jika tidak ada filter, tampilkan semua data
            $dataAnggota = $anggotaModel->findAll();
        }

        return view('Admin/anggota/index', [
            'dataAnggota' => $dataAnggota,
            'startDate'   => $startDate,
            'endDate'     => $endDate,
        ]);
    }

    public function createAnggota()
    {
        return view('Admin/anggota/create');
    }

    public function storeAnggota()
    {
        $this->anggotaModel->save([
            'nama'         => $this->request->getPost('nama'),
            'alamat'       => $this->request->getPost('alamat'),
            'jk'           => $this->request->getPost('jk'),
            'agama'        => $this->request->getPost('agama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
            'tgl_daftar'   => date('Y-m-d'),
        ]);

        return redirect()->to('/admin/data-anggota')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function editAnggota($id)
    {
        $data = [
            'anggota' => $this->anggotaModel->find($id),
        ];
        return view('Admin/anggota/edit', $data);
    }

    public function updateAnggota($id)
    {
        $this->anggotaModel->update($id, [
            'nama'         => $this->request->getPost('nama'),
            'alamat'       => $this->request->getPost('alamat'),
            'jk'           => $this->request->getPost('jk'),
            'agama'        => $this->request->getPost('agama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
        ]);

        return redirect()->to('/admin/data-anggota')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function deleteAnggota($id)
    {
        $this->anggotaModel->delete($id);
        return redirect()->to('/admin/data-anggota')->with('success', 'Anggota berhasil dihapus.');
    }
    // end anggota

    // data buku
    public function dataBuku()
    {
        $dataBuku = $this->bukuModel->findAll();
        return view('Admin/buku/index', ['dataBuku' => $dataBuku]);
    }

    // Halaman tambah buku
    public function createBuku()
    {
        return view('Admin/buku/create');
    }

    // Proses simpan data buku
    public function storeBuku()
    {
        $this->bukuModel->save([
            'judul'         => $this->request->getPost('judul'),
            'pengarang'     => $this->request->getPost('pengarang'),
            'tahun_terbit'  => $this->request->getPost('tahun_terbit'),
            'isbn'          => $this->request->getPost('isbn'),
            'kategori'      => $this->request->getPost('kategori'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/data-buku')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Halaman edit buku
    public function editBuku($id)
    {
        $data = [
            'buku' => $this->bukuModel->find($id),
        ];
        return view('Admin/buku/edit', $data);
    }

    // Proses update data buku
    public function updateBuku($id)
    {
        $this->bukuModel->update($id, [
            'judul'         => $this->request->getPost('judul'),
            'pengarang'     => $this->request->getPost('pengarang'),
            'tahun_terbit'  => $this->request->getPost('tahun_terbit'),
            'isbn'          => $this->request->getPost('isbn'),
            'kategori'      => $this->request->getPost('kategori'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/data-buku')->with('success', 'Buku berhasil diperbarui.');
    }

    // Hapus data buku
    public function deleteBuku($id)
    {
        try {
            $this->bukuModel->delete($id);
            return redirect()->to('/admin/data-buku')->with('success', 'Buku berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->to('/admin/data-buku')->with('error', 'Gagal menghapus buku: ' . $e->getMessage());
        }
    }

    // end buku

    // data pengunjung
    // Menampilkan data pengunjung
    public function dataPengunjung()
    {
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        if ($startDate && $endDate) {
            $dataPengunjung = $this->pengunjungModel
                ->where('tgl >=', $startDate)
                ->where('tgl <=', $endDate)
                ->findAll();
        } else {
            $dataPengunjung = $this->pengunjungModel->findAll();
        }

        return view('Admin/pengunjung/index', [
            'dataPengunjung' => $dataPengunjung,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }
    // Hapus data pengunjung
    public function deletePengunjung($id)
    {
        $this->pengunjungModel->delete($id);
        return redirect()->to('/admin/data-pengunjung')->with('success', 'Pengunjung berhasil dihapus.');
    }
    // end pengunjung

    // transaksi peminjaman
    public function transaksiPeminjaman()
    {
        $data = [
            'anggota' => $this->anggotaModel->findAll(),
            'buku' => $this->bukuModel->findAll(),
        ];

        return view('Admin/transaksi/peminjaman', $data);
    }
    public function storeTransaksi()
    {
        $data = [
            'id_buku' => $this->request->getPost('id_buku'),
            'id_anggota' => $this->request->getPost('id_anggota'),
            'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
            'tgl_kembali' => $this->request->getPost('tgl_kembali'),
            'ref' => $this->request->getPost('ref'),
            'status' => 'dipinjam',
        ];

        $this->transModel->insert($data);

        return redirect()->to('/admin/transaksi/pengembalian')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function transaksiPengembalian()
    {
        $data = [
            'transaksi' => $this->transModel
                ->select('trans.*, anggota.nama AS nama_anggota, buku.judul AS judul_buku')
                ->join('anggota', 'anggota.id_anggota = trans.id_anggota')
                ->join('buku', 'buku.id_buku = trans.id_buku')
                ->findAll(),
        ];

        return view('Admin/transaksi/pengembalian', $data);
    }

    public function updateTransaksiPengembalian($id)
    {
        $telat = $this->request->getPost('telat') ?? 0;
        $denda = $this->request->getPost('denda') ?? 0;

        $data = [
            'tgl_kembali' => date('Y-m-d'),
            'telat' => $telat,
            'denda' => $denda,
            'status' => 'dikembalikan',
        ];

        $this->transModel->update($id, $data);

        return redirect()->to('/admin/transaksi/pengembalian')->with('success', 'Buku berhasil dikembalikan.');
    }

    // end transaksi

    // laporan
    public function laporanPeminjaman()
    {
        $startDate = $this->request->getGet('start_date');
        $endDate   = $this->request->getGet('end_date');

        $query = $this->transModel->select('trans.*, anggota.nama as nama_anggota, buku.judul as judul_buku')
            ->join('anggota', 'anggota.id_anggota = trans.id_anggota')
            ->join('buku', 'buku.id_buku = trans.id_buku')
            ->where('trans.status', 'dipinjam');

        // Tambahkan filter tanggal jika ada
        if ($startDate && $endDate) {
            $query->where('tgl_pinjam >=', $startDate)
                ->where('tgl_pinjam <=', $endDate);
        }

        $data = [
            'peminjaman' => $query->findAll(),
            'startDate'  => $startDate,
            'endDate'    => $endDate,
        ];

        return view('Admin/laporan/peminjaman', $data);
    }

    public function cetakLaporanPeminjaman()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate   = $this->request->getPost('end_date');

        $query = $this->transModel->select('trans.*, anggota.nama as nama_anggota, buku.judul as judul_buku')
            ->join('anggota', 'anggota.id_anggota = trans.id_anggota')
            ->join('buku', 'buku.id_buku = trans.id_buku')
            ->where('trans.status', 'dipinjam');

        // Tambahkan filter tanggal jika ada
        if ($startDate && $endDate) {
            $query->where('tgl_pinjam >=', $startDate)
                ->where('tgl_pinjam <=', $endDate);
        }

        $data['peminjaman'] = $query->findAll();

        $html = view('Admin/laporan/cetak_peminjaman', $data);

        // Konfigurasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Kirim ke browser
        $dompdf->stream("Laporan_Peminjaman.pdf", ["Attachment" => 0]);
    }

    public function laporanPengembalian()
    {
        $startDate = $this->request->getGet('start_date');
        $endDate   = $this->request->getGet('end_date');

        $query = $this->transModel->select('trans.*, anggota.nama as nama_anggota, buku.judul as judul_buku')
            ->join('anggota', 'anggota.id_anggota = trans.id_anggota')
            ->join('buku', 'buku.id_buku = trans.id_buku')
            ->where('trans.status', 'dikembalikan');

        if ($startDate && $endDate) {
            $query->where('tgl_pinjam >=', $startDate)
                ->where('tgl_pinjam <=', $endDate);
        }

        $data = [
            'pengembalian' => $query->findAll(),
            'startDate'    => $startDate,
            'endDate'      => $endDate,
        ];

        return view('Admin/laporan/pengembalian', $data);
    }

    public function cetakLaporanPengembalian()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate   = $this->request->getPost('end_date');

        $query = $this->transModel->select('trans.*, anggota.nama as nama_anggota, buku.judul as judul_buku')
            ->join('anggota', 'anggota.id_anggota = trans.id_anggota')
            ->join('buku', 'buku.id_buku = trans.id_buku')
            ->where('trans.status', 'dikembalikan');

        // Tambahkan filter tanggal jika ada
        if ($startDate && $endDate) {
            $query->where('tgl_pinjam >=', $startDate)
                ->where('tgl_pinjam <=', $endDate);
        }

        $data['pengembalian'] = $query->findAll();

        $html = view('Admin/laporan/cetak_pengembalian', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("Laporan_Pengembalian.pdf", ["Attachment" => 0]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
