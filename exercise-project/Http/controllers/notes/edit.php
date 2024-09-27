<?php

use Http\Requests\notes\GetNoteRequest;
use Http\Repositories\NotesRepository;

$response = (new GetNoteRequest())->process();

if (!empty($response['errors'])) {
    if(isset($response['errors']['id'])) {
        $status = $response['errors']['id']['status'];
        view("{$status}.php");
        return;
    }
}

$note = (new NotesRepository())->getById($response['data']['id'],);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);