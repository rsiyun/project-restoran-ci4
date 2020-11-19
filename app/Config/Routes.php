<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('homepage');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'Front\LoginP::index');

$routes->get('cart/keranjang', 'front\cart::index');
$routes->get('cart/keranjang/(:num)', 'front\cart::index/$1');
$routes->get('cart/tambah/(:num)', 'front\cart::tambah/$1');
$routes->get('history/detail/(:num)', 'front\history::detail/$1');
$routes->get('checkout', 'front\checkout::index');
$routes->get('cart/kurang/(:num)', 'front\cart::kurang/$1');
$routes->get('cart/delete/(:num)', 'front\cart::delete/$1');
$routes->get('/login/user', 'Admin\Login::index');
$routes->group('admin', ['filter' => 'Auth'], function ($routes) {
	$routes->add('/', 'Admin\adminpage::index');
	$routes->add('kategori', 'Admin\kategori::read');
	$routes->add('kategori/create', 'Admin\kategori::create');
	$routes->add('kategori/find/(:any)', 'Admin\kategori::find/$1');


	$routes->add('menu', 'Admin\menu::index');
	$routes->delete('menu/(:num)', 'Admin\menu::delete/$1');
	$routes->add('menu/find/(:any)', 'Admin\menu::find/$1');
	$routes->add('menu/create', 'Admin\menu::create');
	$routes->add('menu/read', 'Admin\menu::read');


	$routes->add('order', 'Admin\order::index');
	$routes->add('order/find/(:any)', 'Admin\order::find/$1');

	$routes->add('pelanggan', 'Admin\pelanggan::index');
	$routes->delete('pelanggan/(:num)', 'Admin\pelanggan::delete/$1');

	$routes->add('orderdetail', 'Admin\orderdetail::index');

	$routes->add('user', 'Admin\user::index');
	$routes->add('user/find/(:any)', 'Admin\user::find/$1');
	$routes->add('user/create', 'Admin\user::create');
	$routes->delete('user/(:num)', 'Admin\user::delete/$1');
});


/**
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
