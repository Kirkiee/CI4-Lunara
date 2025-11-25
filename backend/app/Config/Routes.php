<?php

use CodeIgniter\Router\RouteCollection;

/**
 
@var RouteCollection $routes*/
$routes->get('/', 'Users::index');
$routes->get('/login', 'Auth::showLogin');
$routes->get('/signup', 'Auth::showSignup');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/shop', 'Users::shop');

$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/stock', 'Admin::stock');
$routes->get('/admin/orders', 'Admin::orders');
$routes->get('/admin/accounts', 'Admin::accounts');
$routes->get('/admin/request', 'Admin::request');


$routes->post('login', 'Auth::login');
$routes->post('logout', 'Auth::logout');
$routes->post('signup', 'Auth::signup');
$routes->get('/test/show', 'CRUDTesting::showUsersPage');
$routes->post('/admin/accounts/create', 'test\UserCreate::CRUDTesting');
$routes->post('/admin/accounts/update/(:num)', 'test\UserUpdate::update/$1');
