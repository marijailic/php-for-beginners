<?php

use Http\Requests\notes\GetNotesRequest;
use Http\Repositories\NotesRepository;

$response = (new GetNotesRequest())->process();

if(!empty($response['errors'])){
    if(isset($response['errors']['userId'])) {
        $status = $response['errors']['userId']['status'];
        view("{$status}.php");
        return;
    }
}

$notes = (new NotesRepository())->getByUserId($response['data']['userId']);

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);