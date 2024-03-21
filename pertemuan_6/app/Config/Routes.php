<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Form::index');
$routes->post('form/create', 'Form::create');
$routes->post('form/update', 'Form::update');
$routes->post('form/delete', 'Form::delete');
$routes->setAutoRoute(true);
