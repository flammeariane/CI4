<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::register');

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    //declaration des route protéger la par le filter d authentification
    $routes->get('/dashboardAdmin', 'dashboardAdminController::index');
    $routes->get('/dashboardAdmin/editUser/(:num)', 'dashboardAdminController::editUser/$1');
    $routes->post('/dashboardAdmin/updateUser/(:num)', 'dashboardAdminController::updateUser/$1');
    $routes->delete('/dashboardAdmin/deleteUser/(:num)', 'dashboardAdminController::deleteUser/$1');
    $routes->post('/dashboardAdmin/action/(:num)', 'dashboardAdminController::action/$1');


    $routes->get('/dashboardUser', 'dashboardUserController::index');
    $routes->post('/dashboardUser/addBook/', 'dashboardUserController::addBook');
    $routes->get('/dashboardUser/editBook/(:num)', 'dashboardUserController::editBook/$1');
    $routes->post('/dashboardUser/updateBook/(:num)', 'dashboardUserController::updateBook/$1');
    $routes->delete('/dashboardUser/deleteBook/(:num)', 'dashboardUserController::deleteBook/$1');
    $routes->delete('/dashboardUser/deleteBookFromLib/(:num)', 'dashboardUserController::deleteBookFromLib/$1');
});

$routes->group('', ['filter' => 'AlreadyLoggedFilter'], function ($routes) {
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/register', 'Auth::register');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
