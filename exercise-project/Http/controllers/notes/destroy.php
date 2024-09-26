<?php

use Http\Repositories\NotesRepository;
use Http\Requests\notes\DestroyNotesRequest;

$response = (new DestroyNotesRequest($_GET['id']))->process();

if (!empty($response['errors'])) {
    $status = $response['errors']['id']['status'];
    view("{$status}.php");
    return;
}

(new NotesRepository())->deleteById($response['data']['id']);

header('Location: /notes');
die();