<style>
    .menu {
        background-color: #000;
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

    .menu a.active {
        background-color: #f44336;
        border-radius: 5px;
    }

    .menu a:hover {
        background-color: #f44336;
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

    .menu .dropdown:hover>a {
        background-color: #f44336;
        border-radius: 5px;
    }
</style>

<?php
$currentUrl = current_url(); // Mendapatkan URL saat ini
?>

<div class="menu">
    <a href="<?= base_url('/admin/dashboard'); ?>" class="<?= $currentUrl == base_url('/admin/dashboard') ? 'active' : ''; ?>">Home</a>
    <div class="dropdown">
        <a href="#" class="<?= strpos($currentUrl, '/admin/transaksi') !== false ? 'active' : ''; ?>">Transaksi</a>
        <div class="dropdown-content">
            <a href="<?= base_url('/admin/transaksi/peminjaman'); ?>" class="<?= $currentUrl == base_url('/admin/transaksi/peminjaman') ? 'active' : ''; ?>">Peminjaman</a>
            <a href="<?= base_url('/admin/transaksi/pengembalian'); ?>" class="<?= $currentUrl == base_url('/admin/transaksi/pengembalian') ? 'active' : ''; ?>">Pengembalian</a>
        </div>
    </div>
    <a href="<?= base_url('/admin/data-anggota'); ?>" class="<?= $currentUrl == base_url('/admin/data-anggota') ? 'active' : ''; ?>">Data Anggota</a>
    <a href="<?= base_url('/admin/data-buku'); ?>" class="<?= $currentUrl == base_url('/admin/data-buku') ? 'active' : ''; ?>">Data Buku</a>
    <a href="<?= base_url('/admin/data-pengunjung'); ?>" class="<?= $currentUrl == base_url('/admin/data-pengunjung') ? 'active' : ''; ?>">Data Pengunjung</a>
    <div class="dropdown">
        <a href="#" class="<?= strpos($currentUrl, '/admin/laporan') !== false ? 'active' : ''; ?>">Laporan</a>
        <div class="dropdown-content">
            <a href="<?= base_url('/admin/laporan/peminjaman'); ?>" class="<?= $currentUrl == base_url('/admin/laporan/peminjaman') ? 'active' : ''; ?>">Peminjaman</a>
            <a href="<?= base_url('/admin/laporan/pengembalian'); ?>" class="<?= $currentUrl == base_url('/admin/laporan/pengembalian') ? 'active' : ''; ?>">Pengembalian</a>
        </div>
    </div>
    <a href="#" id="logout">Logout</a>
</div>