<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('logicsense', 'LogicSense::index');
$routes->post('logicsense/prosesCek', 'LogicSense::prosesCek');
