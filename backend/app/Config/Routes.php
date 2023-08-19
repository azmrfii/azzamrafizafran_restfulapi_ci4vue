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
// $routes->setDefaultController('Post');
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
$routes->get('/', 'Home::index');
// $routes->post('api/register', 'Register::index');
// $routes->post('api/register', ['controller' => 'Register']);
// $routes->post('api/login', 'Login::index');
// $routes->post('api/login', ['controller' => 'Login']);
$routes->resource('api/post', ['controller' =>'Post']);
$routes->resource('api/kategori', ['controller' =>'Kategori']);

// $routes->get('api/post/new', 'Post::new');
// $routes->post('api/post', 'Post::create');
// $routes->get('api/post', 'Post::index');
// $routes->get('api/post/(:segment)',      'Post::show/$1');
// $routes->get('api/post/(:segment)/edit', 'Post::edit/$1');
// $routes->put('api/post/(:segment)',      'Post::update/$1');
// $routes->patch('api/post/(:segment)',    'Post::update/$1');
// $routes->delete('api/post/(:segment)',   'Post::delete/$1');
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
