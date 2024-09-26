<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->group(['middleware' => 'guest'], function($router) {
    $router->get('/register', 'registration/create.php');
    $router->post('/register', 'registration/store.php');

    $router->get('/login', 'session/create.php');
    $router->post('/session', 'session/store.php');
});

$router->group(['middleware' => 'auth'], function($router) {
    $router->get('/notes', 'notes/index.php');
    $router->get('/note', 'notes/show.php');
    $router->delete('/note/destroy', 'notes/destroy.php');

    $router->get('/note/edit', 'notes/edit.php');
    $router->patch('/note', 'notes/update.php');

    $router->get('/notes/create', 'notes/create.php');
    $router->post('/notes', 'notes/store.php');

    $router->delete('/session', 'session/destroy.php');
});