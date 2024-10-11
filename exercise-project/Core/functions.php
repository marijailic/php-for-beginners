<?php

//use Core\Response;
use Core\Session;

// dump and die funkcija
function dd($value){
    // <pre> formatira output da bude citljiv
    echo "<pre>";
    // var_dump ispisuje strukturirane informacije
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value){
    return $_SERVER["REQUEST_URI"] === $value;
}

function abort($code = 404){
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

//function authorize($condition, $status = Response::FORBIDDEN){
//    if(!$condition){
//        abort($status);
//    }
//}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = []){
    // extract raspakirava polje u set varijabli
    extract($attributes);
    require base_path('views/' . $path);
}

function redirect($path){
    header("location: {$path}");
//    exit();
}

function old($key, $default = ''){
    return Session::get('old')[$key] ?? $default;
}