<?php

use Http\Repositories\NotesRepository;
use Core\Middleware\Auth;

$note = (new NotesRepository())->getById($_GET['id']);
Auth::authorize($note['user_id']);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);