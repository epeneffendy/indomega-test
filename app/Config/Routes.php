<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');


$routes->get('/', 'Admin\DashboardController::index');

//Dashboard
$routes->get('/dashboard', 'Admin\DashboardController::index');

//Ships
$routes->get('/ships', 'Admin\ShipsController::index');
$routes->get('/ships/create', 'Admin\ShipsController::create');
$routes->post('/ships/save', 'Admin\ShipsController::save');
$routes->get('/ships/edit/(:num)', 'Admin\ShipsController::edit/$1');
$routes->get('/ships/delete/(:num)', 'Admin\ShipsController::delete/$1');

//Pricing
$routes->get('/pricing', 'Admin\PricingController::index');
$routes->get('/pricing/create', 'Admin\PricingController::create');
$routes->post('/pricing/save', 'Admin\PricingController::save');
$routes->get('/pricing/edit/(:num)', 'Admin\PricingController::edit/$1');
$routes->get('/pricing/delete/(:num)', 'Admin\PricingController::delete/$1');

//Rents
$routes->get('/rents', 'Admin\RentsController::index');
$routes->get('/rents/create', 'Admin\RentsController::create');
$routes->post('/rents/save', 'Admin\RentsController::save');
$routes->get('/rents/edit/(:num)', 'Admin\RentsController::edit/$1');
$routes->get('/rents/delete/(:num)', 'Admin\RentsController::delete/$1');
$routes->post('/rents/get_price', 'Admin\RentsController::get_price');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}