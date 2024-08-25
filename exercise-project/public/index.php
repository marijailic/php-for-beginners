<?php

    use Core\Router;

    const BASE_PATH = __DIR__ . '/../';

    require BASE_PATH . "Core/functions.php";

    // require base_path("Database.php");
    // require base_path("Core/Response.php");

    // spl_autoload_register fn se automatski pokrece na instanciranju klase
    // na ovaj nacin se klase ne moraju eksplicitno (manualno) dodavati
    spl_autoload_register(function ($class){

        // Core\Database -> Core/Database
        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

        require base_path($class . ".php");
    });

    require base_path("bootstrap.php");

    $router = new \Core\Router();

    $routes = require base_path("routes.php");

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

    $router->route($uri, $method);

    // require base_path("Core/Router.php");

    // $config = require "config.php";
    // $db = new Database($config['database']);

    // $posts = $db->query("select * from posts")->fetchAll();
    // dd($posts);

    // $_GET je superglobal - uzimam query parametar
    // $id = $_GET["id"];

    // nikada ne inlineat user data u query string - SQL Injection
    // $query = "select * from posts where id = {$id}";
    // $post = $db->query($query)->fetch();

    // sql query s ?
    // $query = "select * from posts where id = ?";
    // $post = $db->query($query, [$id])->fetch();

    // sql query s keyem (:id), parametar je asocijativno polje
    // $query = "select * from posts where id = :id";
    // $post = $db->query($query, [':id' => $id])->fetch();

    // dd($post);