<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('', ['namespace' => 'App\Controllers'], function($routes)
{
	// Iniciar y cerrar sesión.
	$routes->get('iniciar-sesion', 'LoginController::login', ['as' => 'iniciar-sesion']);
	$routes->post('iniciar-sesion', 'LoginController::verifyLogin');
	$routes->get('cerrar-sesion', 'LoginController::logout');
});

$routes->group('actividades', ['namespace' => 'App\Controllers'], function($routes)
{
	// Actividades, formualrio y vista.
	$routes->get('/', 'ActivityController::activityView', ['as' => 'actividades']);
	$routes->get('nueva', 'ActivityController::activityForm', ['as' => 'actividad-nueva']);
	$routes->post('nueva', 'ActivityController::activityRegister');
	//$routes->get('actividades/(:any)', 'ActivityController::forInstitution');
});

$routes->group('instituciones', ['namespace' => 'App\Controllers'], function($routes)
{
	//$routes->get('/', 'InstitutionController::institutionView', ['as' => 'instituciones']);
	$routes->get('nueva', 'InstitutionController::institutionForm', ['as' => 'institucion-nueva']);
	$routes->post('nueva', 'InstitutionController::institutionRegister');
});

$routes->group('usuarios', ['namespace' => 'App\Controllers'], function($routes)
{
	$routes->get('/', 'UserController::usersView', ['as' => 'usuarios']);
	$routes->get('nuevo', 'UserController::userForm', ['as' => 'usuario-nuevo']);
	$routes->post('nuevo', 'UserController::userRegister');
});

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
