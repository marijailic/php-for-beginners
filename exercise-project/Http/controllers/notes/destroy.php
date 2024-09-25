<?php

use Http\Repositories\NotesRepository;
use Http\Requests\notes\DestroyNotesRequest;

$response = (new DestroyNotesRequest($_GET['id']))->process();

// TODO - validacija

(new NotesRepository())->deleteById($response['data']['id']);

header('Location: /notes');
die();