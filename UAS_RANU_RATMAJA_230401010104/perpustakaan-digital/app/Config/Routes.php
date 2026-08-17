<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Auth (login & logout)
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::prosesLogin');
$routes->get('logout', 'Auth::logout');

// Halaman utama dialihkan ke daftar buku
$routes->get('/', static function () {
    return redirect()->to('/buku');
});

// Area yang dilindungi session (harus login dulu)
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('buku', 'Buku::index');
    $routes->get('buku/tambah', 'Buku::create');
    $routes->post('buku/simpan', 'Buku::store');
    $routes->get('buku/edit/(:num)', 'Buku::edit/$1');
    $routes->post('buku/update/(:num)', 'Buku::update/$1');
    $routes->post('buku/hapus/(:num)', 'Buku::delete/$1');
});
