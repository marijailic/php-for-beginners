<?php

namespace Http\Requests\users;

use Http\Requests\BasicRequest;

class StoreUserRequest extends BasicRequest
{
//    TODO
//    protected string $email;
//    protected string $password;
    protected $email;
    protected $password;

    public function process()
    {
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        if (!$this->validate()) {
            return [
                'data' => [
                    'email' => $this->email,
                    'password' => $this->password,
                ],
                'errors' => $this->errors
            ];
        }

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
            ['email' => $this->email, 'password' => $this->password],
            ['email' => 'email', 'password' => ['string', 7, 255]]
        );

        return !$this->failed();
    }
}