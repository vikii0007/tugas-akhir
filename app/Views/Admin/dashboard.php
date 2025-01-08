<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan ADP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #fff;
      color: #000;
      padding: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .header img {
      background-color: white;
      padding: 5px;
      border-radius: 5px;
      height: 100px;
      width: 100px;
    }

    .header .text {
      text-align: left;
    }

    .header h1 {
      margin: 0;
      font-size: 1.5rem;
    }

    .header p {
      margin: 0;
      font-size: 0.9rem;
    }

    /* Menu Styling */
    .menu {
      background-color: #000; /* Latar belakang hitam */
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .menu a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      padding: 10px 15px;
      font-size: 1rem;
    }

    .menu a:hover {
      background-color: #f44336; /* Warna merah saat hover */
      border-radius: 5px;
    }

    .menu .dropdown {
      position: relative;
      display: inline-block;
    }

    .menu .dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff;
      min-width: 150px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .menu .dropdown-content a {
      color: #000;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
    }

    .menu .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .menu .dropdown:hover .dropdown-content {
      display: block;
    }

    .menu .dropdown:hover > a {
      background-color: #f44336;
      border-radius: 5px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      margin: 20px;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <img src="<?= base_url(); ?>/logo.png" alt="Logo">
    <div class="text">
      <h1>Perpustakaan ADP</h1>
      <p>Alamat: Jl. Lintas Timur No. 1, BSD City</p>
    </div>
  </div>

  <!-- Menu -->
  <div class="menu">
    <a href="<?= base_url('/'); ?>">Home</a>
    <a href="<?= base_url('/transaksi'); ?>">Transaksi</a>
    <a href="<?= base_url('/data-anggota'); ?>">Data Anggota</a>
    <a href="<?= base_url('/data-buku'); ?>">Data Buku</a>
    <a href="<?= base_url('/tools'); ?>">Tools</a>
    <div class="dropdown">
      <a href="#">Laporan</a>
      <div class="dropdown-content">
        <a href="<?= base_url('/laporan/peminjaman'); ?>">Peminjaman</a>
        <a href="<?= base_url('/laporan/pengembalian'); ?>">Pengembalian</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="#">Referensi</a>
      <div class="dropdown-content">
        <a href="<?= base_url('/referensi/kategori'); ?>">Kategori</a>
        <a href="<?= base_url('/referensi/penulis'); ?>">Penulis</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="#">Konfigurasi</a>
      <div class="dropdown-content">
        <a href="<?= base_url('/konfigurasi/pengguna'); ?>">Pengguna</a>
        <a href="<?= base_url('/konfigurasi/pengaturan'); ?>">Pengaturan</a>
      </div>
    </div>
    <a href="#" id="logout">Logout</a> <!-- Tambahkan Logout -->
  </div>

  <!-- Konten -->
  <div class="container">
    <div class="content">
      <h2>Selamat Datang di Perpustakaan ADP</h2>
      <p>Gunakan menu di atas untuk mengelola data perpustakaan.</p>
    </div>
  </div>

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

  <!-- Script Logout -->
  <script>
    document.getElementById('logout').addEventListener('click', function (e) {
      e.preventDefault(); // Mencegah tautan default

      Swal.fire({
        title: 'Anda yakin ingin keluar?',
        text: "Anda akan keluar dari sistem.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, keluar',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?= base_url('/admin/logout'); ?>"; // Ganti dengan rute logout
        }
      });
    });
  </script>
</body>

</html>
