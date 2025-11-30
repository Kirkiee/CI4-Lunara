<?php

use CodeIgniter\Router\RouteCollection;

/**
@var RouteCollection $routes
 */

$routes->get('/', 'Users::index');
$routes->get('/login', 'Auth::showLogin');
$routes->get('/signup', 'Auth::showSignup');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/shop', 'Users::shop');
$routes->get('/contact', 'Users::contact');
$routes->get('/cart', 'Users::cart');

$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/accounts', 'Admin::accounts');
$routes->get('/admin/request', 'Admin::request');


$routes->post('login', 'Auth::login');
$routes->post('logout', 'Auth::logout');
$routes->post('signup', 'Auth::signup');
$routes->get('/test/show', 'CRUDTesting::showUsersPage');
$routes->post('/admin/accounts/create', 'test\UserCreate::CRUDTesting');
$routes->post('/admin/accounts/update/(:num)', 'test\UserUpdate::update/$1');
$routes->post('/admin/accounts/delete/(:num)', 'test\UserDelete::delete/$1');
$routes->get('/admin/stock', 'StockTest\StockCreate::index');
$routes->post('/admin/stock/create', 'StockTest\StockCreate::create');
$routes->post('/admin/stock/update/(:num)', 'StockTest\StockCreate::update/$1');
$routes->get('/admin/orders', 'Orders::index');               // list all orders
$routes->get('/admin/orders/view/(:num)', 'Orders::view/$1');
