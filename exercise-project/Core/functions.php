<?php

    use Core\Response;

    // dump and die funkcija
    function dd($value){
        // <pre> formatira output da bude citljiv
        echo "<pre>";
        // var_dump ispisuje strukturirane informacije
        var_dump($value);
        echo "</pre>";
        // die() zaustavlja daljnju egzekuciju
        die();
    }

    // $_SERVER je superglobal array
    // dd($_SERVER);

    // echo $_SERVER["REQUEST_URI"];

    function urlIs($value){
        return $_SERVER["REQUEST_URI"] === $value;
    }

    function abort($code = 404){
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

    function authorize($condition, $status = Response::FORBIDDEN){
        if(!$condition){
            abort($status);
        }
    }

    function base_path($path)
    {
        return BASE_PATH . $path;
    }
    function view($path, $attributes = [])
    {
        // extract raspakirava polje u set varijabli
        extract($attributes);
        require base_path('views/' . $path);
    }

    function login($user)
    {

        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    function logout()
    {
        // ocistim superglobal
        $_SESSION = [];

        // unistim session file
        session_destroy();

        // brisem cookie
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }