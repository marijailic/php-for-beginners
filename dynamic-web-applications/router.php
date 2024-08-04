<?php

    // uzimam path iz REQUEST_URI pomocu parse_url
    $uri = parse_url($_SERVER["REQUEST_URI"])['path'];

    $routes = [
        '/' => 'controllers/index.php',
        '/about' => 'controllers/about.php',
        '/contact' => 'controllers/contact.php',
    ];

    function routeToController($uri, $routes){
        if(array_key_exists($uri, $routes)) {
            require $routes[$uri];
        } else {
            abort();
        }
    }

    // defaultna vrijednost parametra
    function abort($code = 404){
        // dajem response sa status codeom
        http_response_code($code);
        require "views/{$code}.php";
        die();
    }

    routeToController($uri, $routes);