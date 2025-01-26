<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/', 'Pengunjung::index');
$routes->get('/profil', 'Pengunjung::profil');
$routes->get('/cari-buku', 'Pengunjung::cariBuku');
$routes->post('/pengunjung/tambah', 'Pengunjung::tambah');
$routes->get('/admin', 'Admin::index');
$routes->post('masuk', 'Admin::masuk');

// Rute untuk admin dengan filter grup
$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard'); // Dashboard admin
    $routes->get('logout', 'Admin::logout'); // Logout admin

    $routes->get('data-anggota', 'Admin::dataAnggota');
    $routes->get('create-anggota', 'Admin::createAnggota');
    $routes->post('store-anggota', 'Admin::storeAnggota');
    $routes->get('edit-anggota/(:num)', 'Admin::editAnggota/$1');
    $routes->post('update-anggota/(:num)', 'Admin::updateAnggota/$1');
    $routes->get('delete-anggota/(:num)', 'Admin::deleteAnggota/$1');

    $routes->get('data-buku', 'Admin::dataBuku');
    $routes->get('create-buku', 'Admin::createBuku');
    $routes->post('store-buku', 'Admin::storeBuku');
    $routes->get('edit-buku/(:num)', 'Admin::editBuku/$1');
    $routes->post('update-buku/(:num)', 'Admin::updateBuku/$1');
    $routes->get('delete-buku/(:num)', 'Admin::deleteBuku/$1');

    $routes->get('data-pengunjung', 'Admin::dataPengunjung');
    $routes->get('delete-pengunjung/(:num)', 'Admin::deletePengunjung/$1');

    $routes->get('transaksi/peminjaman', 'Admin::transaksiPeminjaman');
    $routes->post('transaksi/peminjaman/store', 'Admin::storeTransaksi');

    $routes->get('transaksi/pengembalian', 'Admin::transaksiPengembalian');
    $routes->post('transaksi/pengembalian/update/(:num)', 'Admin::updateTransaksiPengembalian/$1');

    $routes->get('laporan/peminjaman', 'Admin::laporanPeminjaman');
    $routes->post('laporan/peminjaman/cetak', 'Admin::cetakLaporanPeminjaman');

    $routes->get('laporan/pengembalian', 'Admin::laporanPengembalian');
    $routes->post('laporan/pengembalian/cetak', 'Admin::cetakLaporanPengembalian');


});
