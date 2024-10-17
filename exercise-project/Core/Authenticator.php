<?php

namespace Core;

use Http\Repositories\UsersRepository;

class Authenticator
{
    public function attempt($email, $password)
    {

        $user = (new UsersRepository())->getByEmail($email);

        if($user){
            if(password_verify($password, $user['password'])){
                $this->login([
                    'id' => $user['id'],
                    'email' => $user['email'],
                ]);

                return true;
            }
        }
        return false;
    }

    public function login($user)
    {

        Session::put('user',[
            'id' => $user['id'],
            'email' => $user['email'],
        ]);

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}