<?php

use Http\Repositories\NotesRepository;
use Http\Requests\notes\UpdateNotesRequest;

$response = (new UpdateNotesRequest($_POST['id']))->process();

if (!empty($response['errors'])) {
     view('notes/edit.view.php',[
        'heading' => 'Edit Note',
        'errors' => $response['errors'],
        'note' => $response['data']
    ]);
}

(new NotesRepository())->updateById($response['data']['id'], $response['data']['body']);

header('Location: /notes');
die();