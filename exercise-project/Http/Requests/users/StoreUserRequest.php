<?php

namespace Http\Requests\users;

use Http\Requests\BasicRequest;

class StoreUserRequest extends BasicRequest
{
    protected string $email;
    protected string $password;

    public function process()
    {
        if (!$this->validate()) {
            return [
                'data' => [],
                'errors' => $this->errors
            ];
        }

        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        return [
            'data' => [
                'email' => $this->email,
                'password' => $this->password,
            ],
            'errors' => []
        ];
    }

    protected function validate()
    {
        $this->validateData(
            ['email' => $_POST['email'], 'password' => $_POST['password']],
            ['email' => ['required', 'email'], 'password' => ['required', 'string' => [7, 255]]]
        );

        return !$this->failed();
    }
}