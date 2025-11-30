<?php

use CodeIgniter\Router\RouteCollection;

/**
@var RouteCollection $routes
 */

// User Pages
$routes->get('/', 'Users::index');
$routes->get('/login', 'Auth::showLogin');
$routes->get('/signup', 'Auth::showSignup');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/contact', 'Users::contact');


// Shop Management
$routes->get('/shop', 'Shop::index');
$routes->post('/shop/fetch', 'Shop::fetchProducts');


// Cart Management
$routes->get('/cart', 'Cart::index');
$routes->post('cart/add', 'Cart::add');
$routes->get('/cart/increase/(:num)', 'Cart::increase/$1');
$routes->get('/cart/decrease/(:num)', 'Cart::decrease/$1');
$routes->get('/cart/remove/(:num)',   'Cart::remove/$1');


// Checkout Management
$routes->get('checkout', 'Orders::checkout');
$routes->post('checkout/place', 'Orders::placeOrder');


// Admin Pages
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/accounts', 'Admin::accounts');
$routes->get('/admin/request', 'Admin::request');


// Auth management
$routes->post('login', 'Auth::login');
$routes->post('logout', 'Auth::logout');
$routes->post('signup', 'Auth::signup');


// Create User functionalities
$routes->get('/test/show', 'CRUDTesting::showUsersPage');
$routes->post('/admin/accounts/create', 'test\UserCreate::CRUDTesting');
$routes->post('/admin/accounts/update/(:num)', 'test\UserUpdate::update/$1');
$routes->post('/admin/accounts/delete/(:num)', 'test\UserDelete::delete/$1');


// Add Stock functionalities
$routes->get('/admin/stock', 'StockTest\StockCreate::index');
$routes->post('/admin/stock/create', 'StockTest\StockCreate::create');
$routes->post('/admin/stock/update/(:num)', 'StockTest\StockCreate::update/$1');


// Order Management
$routes->get('/admin/orders', 'Orders::index'); // list all orders
$routes->get('/admin/orders/view/(:num)', 'Orders::view/$1');
