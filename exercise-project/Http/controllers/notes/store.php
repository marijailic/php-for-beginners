<?php

use Http\Repositories\NotesRepository;
use Http\Requests\notes\StoreNotesRequest;

$response = (new StoreNotesRequest())->process();

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