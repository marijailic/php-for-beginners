<?php

use Http\Requests\notes\GetNoteRequest;
use Http\Repositories\NotesRepository;

$processedRequest = new GetNoteRequest();

if (!empty($processedRequest->processedPayload['errors'])) {
    if(isset($processedRequest->processedPayload['errors']['id'])) {
        $status = $processedRequest->processedPayload['errors']['id']['status'];
        view("{$status}.php", [
            'title' => $status
        ]);
        return;
    }
}

$note = (new NotesRepository())->getById($processedRequest->processedPayload['data']['id'],);

view("notes/show.view.php", [
    'heading' => 'Note',
    'title' => 'Note',
    'note' => $note
]);