<?php

namespace Http\Repositories;

use Core\App;

class UsersRepository
{
    protected $db;

    public function __construct($db = null)
    {
        $this->db = $db ?? App::resolve('Core\Database');
    }

    public function getByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        return $this->db->query($query, ['email' => $email])->find();
    }
    public function create($user)
    {
        $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $this->db->query($query, ['email' => $user['email'], 'password' => $user['password']]);
    }
}