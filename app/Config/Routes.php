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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->group('admin', ['filter' => 'adminCheck'], function ($routes) {

    $routes->get('dashboard', 'admin/Dashboard::index', ['as' => 'app_admin_dashboard']);
    $routes->get('users', 'admin/User::index', ['as' => 'app_admin_users']);
    $routes->get('users/algo', 'admin/User::preuba', ['as' => 'app_admin_preuba']);
    $routes->get('users/delete/(:num)', 'admin/User::delete/$1');
});

$routes->group('users', ['filter' => 'authCheck'], function ($routes) {

    // dashboard page
    $routes->get('dashboard', 'users/Dashboard::index', ['as' => 'app_user_dashboard']);

    // profie page
    $routes->get('profile', 'users/Profile::index', ['as' => 'app_profile']);
    $routes->get('profile/edit', 'users/Profile::edit', ['as' => 'app_edit_user']);
    $routes->post('profile/update', 'users/Profile::update', ['as' => 'app_update_user']);
    $routes->get('profile/delete', 'users/Profile::delete', ['as' => 'app_delete_user']);
});

$routes->group('auth', ['filter' => 'AlreadyLoggedInFilter'], function ($routes) {

    // Login/out
    $routes->get('login', 'Auth::login', ['as' => 'app_login']);
    $routes->post('login', 'Auth::attemptLogin', ['as' => 'app_attemptLogin']);
    $routes->post('logout', 'Auth::logout', ['as' => 'app_logout']);

    // Registration
    $routes->get('register', 'Auth::register', ['as' => 'app_register']);
    $routes->post('register', 'Auth::attemptRegister', ['as' => 'app_attemptRegister']);

    // Forgot/Resets
    $routes->get('forgot', 'Auth::forgotPassword', ['as' => 'app_forgot']);
    $routes->post('forgot', 'Auth::attemptForgot', ['as' => 'app_attemptForgot']);
    $routes->get('reset-password', 'Auth::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'Auth::attemptReset');
});

// devices page
$routes->resource('device', ['filter' => 'authCheck'], ['except' => ['show']]);
$routes->resource('deviceadmin', ['filter' => 'adminCheck'], ['except' => ['new']]);

// phone page
$routes->resource('phone', ['filter' => 'authCheck'], ['except' => ['show', 'index']]);

// users (admin)
$routes->resource('usersadmin', ['filter' => 'adminCheck'],  ['except' => ['new']]);
$routes->resource('phoneadmin', ['filter' => 'adminCheck'],  ['except' => ['new, index']]);
$routes->get('useradmin/phones/(:num)', 'Useradmin::listPhones/$1');
$routes->get('useradmin/phones/new/(:num)', 'Useradmin::new/$1');



// charts page
$routes->get('charts/historic/(:num)', 'Chart::historic/$1');
$routes->get('charts/realtime/(:num)', 'Chart::realtime/$1');
$routes->get('charts/hselector', 'Chart::index_historic', ['as' => 'app_chart_selector_historic']);
$routes->get('charts/rtselector', 'Chart::index_realtime', ['as' => 'app_chart_selector_realtime']);

// statics page
$routes->get('statistics', 'admin/Statistics::index', ['as' => 'estadisticas']);


















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
