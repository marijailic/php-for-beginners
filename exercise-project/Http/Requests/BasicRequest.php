<?php

namespace Http\Requests;

use Core\Session;
use Core\Response;

class BasicRequest
{
    protected $currentUserId;

    public function __construct()
    {
        $this->currentUserId = Session::getCurrentUserId();
    }

    public function authorize($userId)
    {
        if ($userId != $this->currentUserId) {
            $status = Response::FORBIDDEN;
            http_response_code($status);
            require base_path("views/{$status}.php");
            die();
        }
    }
}