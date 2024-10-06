<?php

use Http\Requests\notes\StoreNoteRequest;
use Http\Repositories\NotesRepository;

$processedRequest = new StoreNoteRequest();

if(!empty($processedRequest->processedPayload['errors'])){
    if(isset($processedRequest->processedPayload['errors']['body'])) {
        view("notes/create.view.php", [
            'heading' => 'Create Note',
            'errors' => $processedRequest->processedPayload['errors']['body']
        ]);
        return;
    }

    if(isset($processedRequest->processedPayload['errors']['userId'])) {
        $status = $processedRequest->processedPayload['errors']['userId']['status'];
        view("{$status}.php");
        return;
    }
}

(new NotesRepository())->create([
    'body' => $processedRequest->processedPayload['data']['body'],
    'user_id' => $processedRequest->processedPayload['data']['userId'],
]);

header('Location: /notes');
die();