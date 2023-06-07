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
$routes->setDefaultController('Users');
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
$routes->get('/', 'Auth\Users::index', ['filter' => 'AlreadyLoggedIn']);

$routes->post('/auth', 'Auth\Users::processLogin');
$routes->get('/logout', 'Auth\Users::logout', ['filter' => 'AuthCheck']);
$routes->get('/dashboard', 'HomeController::index', ['filter' => 'AuthCheck']);
$routes->get('/tickets', 'TicketsController::index', ['filter' => 'AuthCheck']);

// Employee
$routes->get('/users', 'Admin\EmployeeController::index', ['filter' => 'AuthCheck']);
$routes->get('/users/create', 'Admin\EmployeeController::create', ['filter' => 'AuthCheck']);
$routes->post('/users/create', 'Admin\EmployeeController::create');
$routes->get('/users/edit/(:num)', 'Admin\EmployeeController::edit/$1', ['filter' => 'AuthCheck']);
$routes->post('/users/edit/(:num)', 'Admin\EmployeeController::edit/$1');
$routes->post('/users/delete/(:num)', 'Admin\EmployeeController::delete/$1', ['filter' => 'AuthCheck']);



// Organization
$routes->get('/organization', 'Admin\OrganizationController::index', ['filter' => 'AuthCheck']);
$routes->get('/organization/create', 'Admin\OrganizationController::create', ['filter' => 'AuthCheck']);
$routes->post('/organization/create', 'Admin\OrganizationController::create');
$routes->match(['get', 'post'], '/organization/edit/(:num)', 'Admin\OrganizationController::edit/$1', ['filter' => 'AuthCheck']);
$routes->get('/organization/delete/(:num)', 'Admin\OrganizationController::delete/$1', ['filter' => 'AuthCheck']);

// Ticket
$routes->post('/ticket/create', 'TicketsController::create');

// Fetch JSON
$routes->get('/fetch/(:any)', 'FetchController::index/$1', ['filter' => 'AuthCheck']);
$routes->get('/ticket/(:num)', 'FetchController::getTicket/$1', ['filter' => 'AuthCheck']);

$routes->group('api', ['filter' => 'csrf'], function ($routes) {
    $routes->get('chat/(:num)', 'TicketChatsController::index/$1', ['filter' => 'AuthCheck']);
    $routes->post('chat', 'TicketChatsController::create', ['filter' => 'AuthCheck']);
});
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
