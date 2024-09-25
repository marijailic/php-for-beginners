<?php

use Core\Validator;
use Http\Repositories\UsersRepository;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];

// TODO - errors?
$errors = [];
if (!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)){
    $errors['password'] = 'Please provide a password of at least seven characters';
}

if(!empty($errors)){
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$usersRepository = new UsersRepository();

$user = $usersRepository->getByEmail($email);

if(!$user){
    $usersRepository->create([
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $user = $usersRepository->getByEmail($email);

    (new Authenticator)->login([
        'id' => $user['id'],
        'email' => $email,
    ]);

    header('location: /');
    exit();
}

header('location: /');
exit();