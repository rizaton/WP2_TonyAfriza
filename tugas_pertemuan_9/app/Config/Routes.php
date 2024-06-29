<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/batal', 'Home::index');
$routes->post('/cetak', 'Home::cetak');
$routes->setAutoRoute(true);
