<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/', 'Pengunjung::index');
$routes->get('/profil', 'Pengunjung::profil');
$routes->get('/cari-buku', 'Pengunjung::cariBuku');
$routes->get('/admin', 'Admin::index');
$routes->post('validateAccessCode', 'Admin::validateAccessCode'); // Validasi kode akses
 
// Rute untuk admin dengan filter grup
$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard'); // Dashboard admin
    $routes->get('logout', 'Admin::logout'); // Logout admin

    // Tambahkan rute admin lainnya di sini
    $routes->get('manage-users', 'Admin::manageUsers'); // Contoh fitur kelola pengguna
    $routes->get('reports', 'Admin::reports'); // Contoh fitur laporan
    $routes->post('save-settings', 'Admin::saveSettings'); // Contoh simpan pengaturan
});
