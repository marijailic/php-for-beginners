<?php

use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';

require BASE_PATH . "Core/functions.php";

// rjesava composer autoload
//    // spl_autoload_register fn se automatski pokrece na instanciranju klase
//    // na ovaj nacin se klase ne moraju eksplicitno (manualno) dodavati
//    spl_autoload_register(function ($class){
//
//        // Core\Database -> Core/Database
//        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
//
//        require base_path($class . ".php");
//    });

require base_path("bootstrap.php");

$router = new \Core\Router();
$routes = require base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
    $router->route($uri, $method);
} catch (\Core\ValidationException $exception){
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect($router->previousUrl());
}

Session::unflash();
