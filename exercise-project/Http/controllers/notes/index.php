<?php

use Core\Session;
use Http\Repositories\NotesRepository;

$currentUserId = Session::getCurrentUserId();
$notes = (new NotesRepository())->getByUserId($currentUserId);

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);