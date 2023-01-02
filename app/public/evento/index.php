<?php
require_once('../../vendor/autoload.php');
    $router = new \Bramus\Router\Router();

    $router->before('GET|POST', '/.*', function () {
        session_start();
    });

       $router->get('/', 'EventController@overview');
       $router->get('/events', 'EventController@overviewEvents');
       $router->get('/home', 'EventController@home');
         $router->get('/event/(\d+)', 'EventController@eventid');

       $router->get('/registrate', 'AuthController@register');
       $router->get('/login', 'AuthController@login');
       $router->set404( 'ErrorController@error404');

       
    $router->run();