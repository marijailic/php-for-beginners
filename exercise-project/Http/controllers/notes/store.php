<?php

use Core\Validator;
use Http\Repositories\NotesRepository;
use Core\Session;

// TODO - errors?
$errors = [];

if(!Validator::string($_POST['body'],1,1000)){
    $errors['body']='A body of no more than 1000 characters is required.';
}

if(!empty($errors)){
    view("notes/create.view.php",[
        'heading'=>'Create Note',
        'errors'=>$errors
    ]);
}

if(empty($errors)){
    (new NotesRepository())->create([
        'body' => $_POST['body'],
        'user_id' => Session::getCurrentUserId()
    ]);

    header('Location: /notes');
    die();
}