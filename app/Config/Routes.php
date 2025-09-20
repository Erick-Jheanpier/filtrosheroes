<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'SuperheroeController::index');

$routes->post('superheroes/getByPublisher', 'SuperheroeController::getByPublisher');
$routes->get('superheroes/exportPdf/(:num)', 'SuperheroeController::exportPdf/$1');

