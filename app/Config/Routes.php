<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/tasks/(:num)', 'Tasks::show/$1');
$routes->get('/tasks/new', 'Tasks::new');
$routes->post('/tasks/store', 'Tasks::store');
$routes->get('/tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('/tasks/update/(:num)', 'Tasks::update/$1');
$routes->get('/tasks/delete/(:num)', 'Tasks::delete/$1');

$routes->get('/signup/new', 'Signup::new');
$routes->post('/signup/store', 'Signup::store');
$routes->get('/signup/success', 'Signup::success');

$routes->get('/login/login-form', 'login::loginForm');
$routes->get('/logout', 'login::logout');
$routes->post('/login/store', 'login::store');

$routes->get('/users', 'UserController::users');
