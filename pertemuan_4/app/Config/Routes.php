<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Matakuliah::index');
$routes->setAutoRoute(true);
