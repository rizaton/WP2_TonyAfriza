<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/form', 'Login::form');
// $routes->setAutoRoute(true);
