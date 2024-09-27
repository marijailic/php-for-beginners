<?php

use Http\Requests\notes\DestroyNoteRequest;
use Http\Repositories\NotesRepository;

$response = (new DestroyNoteRequest())->process();

if (!empty($response['errors'])) {
    $status = $response['errors']['id']['status'];
    view("{$status}.php");
    return;
}

(new NotesRepository())->deleteById($response['data']['id']);

header('Location: /notes');
die();