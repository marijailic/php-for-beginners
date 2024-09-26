<?php

use Http\Repositories\NotesRepository;
use Http\Requests\notes\UpdateNotesRequest;

$response = (new UpdateNotesRequest($_POST['id']))->process();

if (!empty($response['errors'])) {
    if(isset($response['errors']['id'])) {
        $status = $response['errors']['id']['status'];
        view("{$status}.php");
        return;
    }

    if(isset($response['errors']['body'])) {
        view('notes/edit.view.php',[
            'heading' => 'Create Note',
            'errors' => $response['errors']['body'],
            'note' => $response['data']
        ]);
        return;
    }
}

(new NotesRepository())->updateById($response['data']['id'], $response['data']['body']);

header('Location: /notes');
die();