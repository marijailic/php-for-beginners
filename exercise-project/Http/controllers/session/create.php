<?php

use Core\Session;

$csrf = md5(uniqid(rand(), true));
Session::put('csrf', $csrf);

view('session/create.view.php', [
    'errors' => Session::get('errors'),
    'title' => 'Login',
    'csrf' => $csrf
]);