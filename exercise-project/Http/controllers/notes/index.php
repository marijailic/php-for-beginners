<?php

use Http\Requests\notes\GetNotesRequest;
use Http\Repositories\NotesRepository;

$processedRequest = new GetNotesRequest;

if(!empty($processedRequest->processedPayload['errors'])){
    if(isset($processedRequest->processedPayload['errors']['userId'])) {
        $status = $processedRequest->processedPayload['errors']['userId']['status'];
        view("{$status}.php", [
            'title' => $status
        ]);
        return;
    }
}

$notes = (new NotesRepository())->getByUserId($processedRequest->processedPayload['data']['userId']);

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'title' => 'Notes',
    'notes' => $notes
]);