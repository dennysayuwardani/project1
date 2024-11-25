<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pelanggan::index');
$routes->get('/pelanggan', 'Pelanggan::index');
