<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';

// LOGIN & LOGOUT
$route['login']         = 'Auth/index';
$route['login/proses']  = 'Auth/proses_login';
$route['logout']        = 'Auth/logout';

// DASHBOARD ADMIN
$route['dashboard'] = 'Dashboard/index';

// PELANGGAN (ADMIN)
$route['pelanggan']                = 'Pelanggan/index';
$route['pelanggan/tambah']         = 'Pelanggan/tambah';
$route['pelanggan/simpan']         = 'Pelanggan/simpan';
$route['pelanggan/edit/(:num)']    = 'Pelanggan/edit/$1';
$route['pelanggan/update/(:num)']  = 'Pelanggan/update/$1';
$route['pelanggan/hapus/(:num)']   = 'Pelanggan/hapus/$1';

// LAYANAN
$route['layanan']                = 'Layanan/index';
$route['layanan/tambah']         = 'Layanan/tambah';
$route['layanan/simpan']         = 'Layanan/simpan';
$route['layanan/edit/(:num)']    = 'Layanan/edit/$1';
$route['layanan/update/(:num)']  = 'Layanan/update/$1';
$route['layanan/hapus/(:num)']   = 'Layanan/hapus/$1';

// TRANSAKSI
$route['transaksi']                       = 'Transaksi/index';
$route['transaksi/tambah']                = 'Transaksi/tambah';
$route['transaksi/simpan']                = 'Transaksi/simpan';
$route['transaksi/edit/(:num)']           = 'Transaksi/edit/$1';
$route['transaksi/update/(:num)']         = 'Transaksi/update/$1';
$route['transaksi/hapus/(:num)']          = 'Transaksi/hapus/$1';
$route['transaksi/update_status/(:num)']  = 'Transaksi/update_status/$1';
$route['transaksi/nota/(:num)']           = 'Transaksi/nota/$1';
$route['transaksi/get_harga/(:num)']      = 'Transaksi/get_harga/$1';

// REGISTER PELANGGAN
$route['register']         = 'Register/index';
$route['register/proses']  = 'Register/proses';

// DASHBOARD PELANGGAN
$route['user/dashboard']         = 'UserPanel/index';
$route['user/riwayat']           = 'UserPanel/riwayat';
$route['user/detail/(:num)']     = 'UserPanel/detail/$1';
$route['user/profil']            = 'UserPanel/profil';
$route['user/update_profil']     = 'UserPanel/update_profil';
$route['user/logout']            = 'UserPanel/logout';

// LAPORAN
$route['laporan'] = 'Laporan/index';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
