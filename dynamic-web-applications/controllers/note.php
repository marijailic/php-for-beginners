<?php

    $config = require "config.php";
    $db = new Database($config['database']);

    $heading = "Note";

    // hendlanje magic numbera
    // magic number ima svoju signifikantnost i vazno ju je naznaciti
    $currentUserId = 4;

    $note = $db->query('select * from notes where id= :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    // premjesteno u findOrFail fn
    // if (!$note){
    //     abort();
    // }

    authorize($note['user_id'] == $currentUserId);

    // poopceno u authorize helper fn
    // if ($note['user_id'] != $currentUserId){
    //     // import status codea ('magic numbera') iz Response klase
    //     abort(Response::FORBIDDEN);
    // }

    require "views/note.view.php";