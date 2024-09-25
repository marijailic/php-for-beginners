<?php

use Http\Repositories\NotesRepository;
use Core\Middleware\Auth;

$note = (new NotesRepository())->getById($_GET['id']);
Auth::authorize($note['user_id']);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);