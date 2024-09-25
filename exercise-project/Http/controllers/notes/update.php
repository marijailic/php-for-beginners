<?php

use Http\Repositories\NotesRepository;
use Core\Middleware\Auth;
use Core\Validator;

$notesRepository = new NotesRepository();
$note = $notesRepository->getById($_POST['id']);
Auth::authorize($note['user_id']);

// TODO - errors?
$errors = [];
if(!Validator::string($_POST['body'],1,1000)){
    $errors['body']='A body of no more than 1000 characters is required.';
}

if (count($errors)){
     view('notes/edit.view.php',[
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$notesRepository->updateById($_POST['id'], $_POST['body']);

header('location: /notes');
die();