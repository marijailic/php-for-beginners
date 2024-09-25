<?php

use Http\Repositories\NotesRepository;
use Core\Middleware\Auth;

$notesRepository = new NotesRepository();

$note = $notesRepository->getById($_GET['id']);

Auth::authorize($note['user_id']);

$notesRepository->deleteById($note['id']);

header('Location: /notes');
exit();