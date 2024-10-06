<?php

use Http\Requests\notes\GetNoteRequest;
use Http\Repositories\NotesRepository;

$processedRequest = new GetNoteRequest();

if (!empty($processedRequest->processedPayload['errors'])) {
    if(isset($processedRequest->processedPayload['errors']['id'])) {
        $status = $processedRequest->processedPayload['errors']['id']['status'];
        view("{$status}.php");
        return;
    }
}

$note = (new NotesRepository())->getById($processedRequest->processedPayload['data']['id'],);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);