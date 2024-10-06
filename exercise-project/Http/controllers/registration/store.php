<?php

use Http\Requests\users\StoreUserRequest;
use Http\Repositories\UsersRepository;
use Core\Authenticator;

$processedRequest = new StoreUserRequest();

if(!empty($processedRequest->processedPayload['errors'])){
    view('registration/create.view.php', [
        'errors' => $processedRequest->processedPayload['errors']
    ]);
    return;
}

$email = $processedRequest->processedPayload['data']['email'];
$password = $processedRequest->processedPayload['data']['password'];

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