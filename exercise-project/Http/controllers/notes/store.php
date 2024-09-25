<?php

use Http\Repositories\NotesRepository;
use Http\Requests\notes\StoreNotesRequest;

$response = (new StoreNotesRequest())->process();

if(!empty($response['errors'])){
    view("notes/create.view.php",[
        'heading'=>'Create Note',
        'errors'=>$response['errors']
    ]);
}

(new NotesRepository())->create([
    'body' => $response['data']['body'],
    'user_id' => $response['data']['userId'],
]);

header('Location: /notes');
die();