<?php

use CodeIgniter\Router\RouteCollection;


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
//$routes->setTranslateURIDashes(false);
//$routes->set404Override();
//$routes->setAutoRoute(true);




/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home');
$routes->get('/principal_ultimo', 'Home');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/acerca_de', 'Home::acerca_de');
$routes->get('/registrarse', 'Home::registrarse');
$routes->get('/login', 'Home::login');

//Rutas del Registro de Usuario
$routes->get('/login', 'usuario_controller::create');
$routes->post('/enviar-form','usuario_controller::formValidation');

//rutas del login
$routes->get('/login', 'login_controller');
$routes->post('/enviarlogin', 'login_controller::auth');
$routes->get('/panel', 'panel_controller', ['filter' => 'auth']);
$routes->get('/logout', 'login_controller::logout');



$routes->get('/editar_usuario/(:num)', 'usuario_controller::editarUsuario/$1');
$routes->post('/actualizar', 'usuario_controller::actualizar');
$routes->get('/eliminar_usuario/(:num)', 'usuario_controller::eliminarUsuario/$1');
$routes->get('/mostrar_usuarios', 'usuario_controller::mostrarUsuarios');

