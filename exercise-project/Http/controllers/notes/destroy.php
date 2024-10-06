<?php

use Http\Requests\notes\DestroyNoteRequest;
use Http\Repositories\NotesRepository;

$processedRequest = new DestroyNoteRequest();

if (!empty($processedRequest->processedPayload['errors'])) {
    $status = $processedRequest->processedPayload['errors']['id']['status'];
    view("{$status}.php");
    return;
}

(new NotesRepository())->deleteById($processedRequest->processedPayload['data']['id']);

header('Location: /notes');
die();