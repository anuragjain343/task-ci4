<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',['filter'=>'noauth']);
$routes->get('/signUp', 'Home::signUp',['filter'=>'noauth']);
$routes->post('/userRegister', 'Home::userRegister');
$routes->post('/userLogin', 'Home::userLogin');
$routes->get('/expoertData', 'Home::expoertData');
$routes->get('/logout', 'Home::logout');
$routes->get('/forgotPassword', 'Home::forgotPassword',['filter'=>'noauth']);
$routes->post('/doForgotPassword', 'Home::doForgotPassword');
$routes->get('/deshboard', 'Home::deshboard',['filter'=>'auth']);
