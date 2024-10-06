<?php

use Http\Requests\notes\UpdateNoteRequest;
use Http\Repositories\NotesRepository;

$processedRequest = new UpdateNoteRequest();

if (!empty($processedRequest->processedPayload['errors'])) {
    if(isset($processedRequest->processedPayload['errors']['id'])) {
        $status = $processedRequest->processedPayload['errors']['id']['status'];
        view("{$status}.php");
        return;
    }

    if(isset($processedRequest->processedPayload['errors']['body'])) {
        view('notes/edit.view.php',[
            'heading' => 'Create Note',
            'errors' => $processedRequest->processedPayload['errors']['body'],
            'note' => $processedRequest->processedPayload['data']
        ]);
        return;
    }
}

(new NotesRepository())->updateById($processedRequest->processedPayload['data']['id'], $processedRequest->processedPayload['data']['body']);

header('Location: /notes');
die();