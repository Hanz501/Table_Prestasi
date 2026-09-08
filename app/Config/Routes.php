<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Route Default
// $routes->get('/', 'Home::index');
// $routes->get('portfolio/create', 'PortfolioController::create');

// Route Portfolio (index tetap publik, bisa dilihat dan di-search tanpa login)
$routes->get('/', 'Home::index');
$routes->get('/portfolio', 'PortfolioController::index');

// Route Auth
$routes->match(['get', 'post'], '/register', 'AuthController::register');
$routes->match(['get', 'post'], '/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

// Route Portfolio yang wajib login (create, update, delete)
// Filter alias "auth" perlu didaftarkan di app/Config/Filters.php
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->match(['get', 'post'], '/portfolio/create', 'PortfolioController::create');
    $routes->get('/portfolio/edit/(:num)', 'PortfolioController::edit/$1');
    $routes->match(['get', 'post', 'put'], '/portfolio/update/(:num)', 'PortfolioController::update/$1');
    $routes->match(['post', 'delete'], '/portfolio/delete/(:num)', 'PortfolioController::delete/$1');
});