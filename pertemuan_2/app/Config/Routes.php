<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/latihan1/penjumlahan/(:num)/(:num)', "Latihan1::penjumlahan/\$1/\$2");
$routes->setAutoRoute(true);
