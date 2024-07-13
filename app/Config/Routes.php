<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$session = session();
if ($session->get('isLoggedIn')) {
    // Rute-rute untuk pengguna yang sudah masuk
    $routes->get('/', 'AdminPagesController::index');
    $routes->get('/pengajuan-kesenian', 'AdminPagesController::pengajuan');
    $routes->get('/data-kesenian', 'AdminPagesController::data_kesenian');
    $routes->post('/acc/(:segment)', 'AdminPagesController::acc/$1');
    $routes->get('/akun-admin', 'AdminPagesController::akun_admin');
    $routes->get('/zip/(:segment)', 'ZipController::index/$1');
    // ...
    $routes->get('/login', 'AdminPagesController::index');
    $routes->get('/logout', 'AuthController::logout');
} else {
    // Rute-rute untuk halaman pengunjung
    $routes->get('/', 'PagesController::index');
    $routes->get('/mail', 'MendaftarKesenianController::index');
    $routes->get('/cari', 'PagesController::search');
    $routes->get('/daftar', 'PagesController::register');
    $routes->post('/daftar', 'MendaftarKesenianController::index');
    $routes->get('/daftar-kesenian', 'PagesController::list');
    $routes->get('/detail-kesenian/(:segment)', 'PagesController::detail/$1');
    $routes->get('/cari', 'PagesController::search');
    $routes->get('/hasil-pencarian', 'PagesController::hasilCari');
    $routes->get('/download-etnik/(:segment)', 'PagesController::download/$1');
    // $routes->post('/cari', 'PagesController::search');
    // login
    $routes->get('/login', 'AuthController::index',);
    $routes->get('/logout', 'AuthController::logout');
    // admin page
    $routes->post('/', 'AuthController::doLogin');
}
