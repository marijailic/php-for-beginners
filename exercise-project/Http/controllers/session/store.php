<?php

use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

// validate csrf token if its not test
if (!defined('PHPUNIT_YOURAPPLICATION_TESTSUITE')) {
    $csrf = $_POST['csrf'];
    $sessionCsrf = Session::get('csrf');

    if ($csrf != $sessionCsrf) {
        $form->error(
            'csrf', 'Invalid or expired session token. Please try again.'
        )->throw();
    }
}

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if(!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

redirect('/');