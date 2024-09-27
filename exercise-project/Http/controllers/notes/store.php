<?php

use Http\Requests\notes\StoreNoteRequest;
use Http\Repositories\NotesRepository;

$response = (new StoreNoteRequest())->process();

if(!empty($response['errors'])){
    if(isset($response['errors']['body'])) {
        view("notes/create.view.php", [
            'heading' => 'Create Note',
            'errors' => $response['errors']['body']
        ]);
        return;
    }

    if(isset($response['errors']['userId'])) {
        $status = $response['errors']['userId']['status'];
        view("{$status}.php");
        return;
    }
}

(new NotesRepository())->create([
    'body' => $response['data']['body'],
    'user_id' => $response['data']['userId'],
]);

header('Location: /notes');
die();