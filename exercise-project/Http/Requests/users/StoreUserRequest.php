<?php

namespace Http\Requests\users;

use Http\Requests\BasicRequest;

class StoreUserRequest extends BasicRequest
{
    public function __construct()
    {
        $this->bindDataToValidate();
        $this->validateData();
        $this->constructPayload();
    }

    protected function bindDataToValidate(): void
    {
        $this->data = ['email' => $_POST['email'], 'password' => $_POST['password']];
    }
}