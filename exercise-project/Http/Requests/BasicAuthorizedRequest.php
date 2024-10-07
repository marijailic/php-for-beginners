<?php

namespace Http\Requests;

use Core\Session;
use Core\Response;

abstract class BasicAuthorizedRequest extends BasicRequest
{
    protected ?int $userIdToAuthorize;

    public function __construct()
    {
        parent::__construct();
        $this->bindUserIdToAuthorize();
        $this->authorizeUser();
    }

    abstract protected function bindUserIdToAuthorize();

    protected function authorizeUser(): void
    {
        if ($this->userIdToAuthorize != Session::getCurrentUserId()) {
            $status = Response::FORBIDDEN;
            http_response_code($status);
            require base_path("views/{$status}.php");
            die();
        }
    }
}