<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Landing::index');

$routes->get('/home', 'Home::index');

/*
 * Myth:Auth routes file.
 */
$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function ($routes) {
    // Login/out
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('logout', 'AuthController::logout');

    // Registration
    // $routes->get('register', 'AuthController::register', ['as' => 'register']);
    $routes->get('register', 'AuthController::register', ['as' => 'register', 'filter' => 'role:Administrator']);
    $routes->post('register', 'AuthController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    $routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
    $routes->post('forgot', 'AuthController::attemptForgot');
    $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'AuthController::attemptReset');
});

// User Management
$routes->get('/user', 'User::index', ['filter' => 'role:Administrator']);
$routes->get('/user/(:num)', 'User::edit/$1', ['filter' => 'role:Administrator']);
$routes->post('/user/(:num)', 'User::update/$1', ['filter' => 'role:Administrator']);
$routes->delete('/user/(:num)', 'User::delete/$1', ['filter' => 'role:Administrator']);

// Level Unit Penerapan Manajemen Resiko (pmr)
$routes->get('/pmr', 'Pmr::index');
$routes->get('/pmr/create', 'Pmr::create', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/pmr/save', 'Pmr::save', ['filter' => 'role:Administrator, Auditor']);
$routes->get('/pmr/(:num)', 'Pmr::detail/$1');
$routes->get('/pmr/edit/(:num)', 'Pmr::edit/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->delete('/pmr/(:num)', 'Pmr::delete/$1', ['filter' => 'role:Administrator, Auditor']);

// Daftar Nama Unit (dnu)
$routes->get('/dnu', 'Dnu::index');


// Sasaran Organisasi (saron)
$routes->get('/saron', 'Saron::index');
$routes->get('/saron/(:num)', 'Saron::detail/$1');
$routes->get('/saron/create/(:num)', 'Saron::create/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/saron/save/(:num)', 'Saron::save/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->get('/saron/edit/(:num)', 'Saron::edit/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/saron/update/(:num)', 'Saron::update/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->delete('/saron/(:num)', 'Saron::delete/$1', ['filter' => 'role:Administrator, Auditor']);

// Struktur Manajemen Resiko (smr)
$routes->get('/smr', 'Smr::index');
$routes->get('/smr/(:num)', 'Smr::detail/$1');
$routes->get('/smr/create/(:num)', 'Smr::create/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/smr/save/(:num)', 'Smr::save/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->get('/smr/edit/(:num)', 'Smr::edit/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/smr/update/(:num)', 'Smr::update/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->delete('/smr/(:num)', 'Smr::delete/$1', ['filter' => 'role:Administrator, Auditor']);

// Stakeholder
$routes->get('/stakeholder', 'Stakeholder::index');
$routes->get('/stakeholder/(:num)', 'Stakeholder::detail/$1');
$routes->get('/stakeholder/create/(:num)', 'Stakeholder::create/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/stakeholder/save/(:num)', 'Stakeholder::save/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->get('/stakeholder/edit/(:num)', 'Stakeholder::edit/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/stakeholder/update/(:num)', 'Stakeholder::update/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->delete('/stakeholder/(:num)', 'Stakeholder::delete/$1', ['filter' => 'role:Administrator, Auditor']);

// Identifikasi Resiko
$routes->get('/identifikasi', 'Identifikasi::index');
$routes->get('/identifikasi/(:num)', 'Identifikasi::detail/$1');
$routes->get('/identifikasi/create/(:num)', 'Identifikasi::create/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/identifikasi/save/(:num)', 'Identifikasi::save/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->get('/identifikasi/edit/(:num)', 'Identifikasi::edit/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/identifikasi/update/(:num)', 'Identifikasi::update/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->delete('/identifikasi/(:num)', 'Identifikasi::delete/$1', ['filter' => 'role:Administrator, Auditor']);

// Mitigasi Resiko 
$routes->get('/mitigasi', 'Mitigasi::index');
$routes->get('/mitigasi/(:num)', 'Mitigasi::detail/$1');
$routes->get('/mitigasi/create/(:num)', 'Mitigasi::create/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/mitigasi/save/(:num)', 'Mitigasi::save/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->get('/mitigasi/edit/(:num)', 'Mitigasi::edit/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/mitigasi/update/(:num)', 'Mitigasi::update/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->delete('/mitigasi/(:num)', 'Mitigasi::delete/$1', ['filter' => 'role:Administrator, Auditor']);

// Monev - Evaluasi Resiko
$routes->get('/evaluasi', 'Evaluasi::index');
$routes->get('/evaluasi/(:num)', 'Evaluasi::detail/$1');
$routes->get('/evaluasi/create/(:num)', 'Evaluasi::create/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/evaluasi/save/(:num)', 'Evaluasi::save/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->get('/evaluasi/edit/(:num)', 'Evaluasi::edit/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->post('/evaluasi/update/(:num)', 'Evaluasi::update/$1', ['filter' => 'role:Administrator, Auditor']);
$routes->delete('/evaluasi/(:num)', 'Evaluasi::delete/$1', ['filter' => 'role:Administrator, Auditor']);

// Pelaporan
// Piagam Manajemen Resiko
$routes->get('/piagam', 'Piagam::index');
$routes->get('/piagam/(:num)', 'Piagam::detail/$1');

// Laporan Profile / Identifikasi Resiko
$routes->get('/profile', 'Profile::index');
$routes->get('/profile/(:num)', 'Profile::detail/$1');

// Grafik Peta Resiko
$routes->get('/grafik_resiko', 'GrafikResiko::index');
$routes->get('/grafik_resiko/(:num)', 'GrafikResiko::detail/$1');

// Laporan Mitigasi Resiko (RTP)
$routes->get('/rtp', 'Rtp::index');
$routes->get('/rtp/(:num)', 'Rtp::detail/$1');

// Laporan Evaluasi Resiko (MONEV)
$routes->get('/monev', 'Monev::index');
$routes->get('/monev/(:num)', 'Monev::detail/$1');

// Grafik Peta Mitigasi (MONEV)
$routes->get('/grafik_mitigasi', 'GrafikMitigasi::index');
$routes->get('/grafik_mitigasi/(:num)', 'GrafikMitigasi::detail/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
