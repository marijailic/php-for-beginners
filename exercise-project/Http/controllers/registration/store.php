<?php

use Http\Requests\users\StoreUserRequest;
use Http\Repositories\UsersRepository;
use Core\Authenticator;

$response = (new StoreUserRequest())->process();

if(!empty($response['errors'])){
    view('registration/create.view.php', [
        'errors' => $response['errors']
    ]);
    return;
}

$email = $response['data']['email'];
$password = $response['data']['password'];

$usersRepository = new UsersRepository();

$user = $usersRepository->getByEmail($email);

if($user){
    header('Location: /');
    die();
}

$usersRepository->create([
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

$user = $usersRepository->getByEmail($email);

(new Authenticator)->login([
    'id' => $user['id'],
    'email' => $email,
]);

header('Location: /');
die();