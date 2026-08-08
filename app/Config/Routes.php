<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

$routes->get('/', 'LandingPages::index');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

$routes->get('login', 'Auth::index');
$routes->post('login/process', 'Auth::login');
$routes->get('logout', 'Auth::logout');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

// Dashboard
$routes->get('admin', 'Admin::index');

// Data Mahasiswa
$routes->get('admin/mahasiswa', 'Admin::mahasiswa');
$routes->post('admin/simpanMahasiswa', 'Admin::simpanMahasiswa');
$routes->post('admin/updateMahasiswa/(:num)', 'Admin::updateMahasiswa/$1');
$routes->get('admin/hapusMahasiswa/(:num)', 'Admin::hapusMahasiswa/$1');

// Data Dosen
$routes->get('admin/dosen', 'Admin::dosen');
$routes->post('admin/simpanDosen', 'Admin::simpanDosen');
$routes->post('admin/updateDosen/(:num)', 'Admin::updateDosen/$1');
$routes->get('admin/hapusDosen/(:num)', 'Admin::hapusDosen/$1');

// Data Lokasi
$routes->get('admin/lokasi', 'Admin::lokasi');
$routes->post('admin/simpanLokasi', 'Admin::simpanLokasi');
$routes->post('admin/updateLokasi/(:num)', 'Admin::updateLokasi/$1');
$routes->get('admin/hapusLokasi/(:num)', 'Admin::hapusLokasi/$1');

// Plotting Kelompok
$routes->get('admin/plotting', 'Admin::plotting');
$routes->post('admin/tambah_kelompok', 'Admin::tambah_kelompok');
$routes->post('admin/simpan_kelompok', 'Admin::simpan_kelompok');
$routes->post('admin/simpan_penempatan', 'Admin::simpan_penempatan');
$routes->get('admin/detail_kelompok/(:num)', 'Admin::detail_kelompok/$1');
$routes->get('admin/edit_kelompok/(:num)', 'Admin::edit_kelompok/$1');
$routes->post('admin/update_kelompok/(:num)', 'Admin::update_kelompok/$1');
$routes->get('admin/hapus_kelompok/(:num)', 'Admin::hapus_kelompok/$1');
$routes->get('admin/hapus_anggota/(:num)', 'Admin::hapus_anggota/$1');

/*
|--------------------------------------------------------------------------
| Mahasiswa
|--------------------------------------------------------------------------
*/

// Dashboard & Informasi
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/informasi', 'Mahasiswa::informasi');

// Program Kerja
$routes->get('mahasiswa/proker', 'Mahasiswa::proker');
$routes->get('mahasiswa/tambahProker', 'Mahasiswa::tambahProker');
$routes->post('mahasiswa/simpanProker', 'Mahasiswa::simpanProker');
$routes->get('mahasiswa/editProker/(:num)', 'Mahasiswa::editProker/$1');
$routes->post('mahasiswa/updateProker/(:num)', 'Mahasiswa::updateProker/$1');
$routes->get('mahasiswa/hapusProker/(:num)', 'Mahasiswa::hapusProker/$1');

// Laporan
$routes->get('mahasiswa/laporan', 'Mahasiswa::laporan');
$routes->get('mahasiswa/tambahLaporan', 'Mahasiswa::tambahLaporan');
$routes->post('mahasiswa/simpanLaporan', 'Mahasiswa::simpanLaporan');
$routes->get('mahasiswa/editLaporan/(:num)', 'Mahasiswa::editLaporan/$1');
$routes->post('mahasiswa/updateLaporan/(:num)', 'Mahasiswa::updateLaporan/$1');
$routes->get('mahasiswa/hapusLaporan/(:num)', 'Mahasiswa::hapusLaporan/$1');

/*
|--------------------------------------------------------------------------
| Dosen
|--------------------------------------------------------------------------
*/

// Dashboard & Monitoring
$routes->get('dosen', 'Dosen::index');
$routes->get('dosen/monitoring', 'Dosen::monitoring'

);
$routes->get('dosen/detailKelompok/(:num)', 'Dosen::detailKelompok/$1');
$routes->get('dosen/mahasiswa/(:num)', 'Dosen::mahasiswa/$1');

// Program Kerja
$routes->get('dosen/detailProker/(:num)', 'Dosen::detailProker/$1');
$routes->get('dosen/approveProker/(:num)', 'Dosen::approveProker/$1');
$routes->post('dosen/tolakProker/(:num)', 'Dosen::tolakProker/$1');

// Laporan
$routes->get('dosen/detailLaporan/(:num)', 'Dosen::detailLaporan/$1');
$routes->post('dosen/approveLaporan/(:num)', 'Dosen::approveLaporan/$1');
$routes->post('dosen/tolakLaporan/(:num)', 'Dosen::tolakLaporan/$1');

// Verifikasi Laporan
$routes->post('dosen/updateVerifikasi/(:num)', 'Dosen::updateVerifikasi/$1');