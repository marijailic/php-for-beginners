<?php

namespace Http\Requests\users;

use Http\Requests\BasicRequest;

class StoreUserRequest extends BasicRequest
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function bindDataToValidate(): void
    {
        $this->data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
    }

    protected function bindRulesForValidation(): void
    {
        $this->rules = [
            'email' => ['required', 'email'],
            'password' => ['required', 'string' => [7, 255]],
        ];
    }
}