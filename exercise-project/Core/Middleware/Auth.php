<?php

namespace Core\Middleware;
use Core\Response;
use Core\Session;
class Auth
{
    public function handle()
    {
        if(!$_SESSION['user'] ?? false){
            header('location: /');
            exit();
        }
    }
    public static function authorize( $userId, $status = Response::FORBIDDEN)
    {
        if ($userId != Session::getCurrentUserId()) {
            http_response_code($status);
            require base_path("views/{$status}.php");
            die();
        }
    }
}


