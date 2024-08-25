<?php

    //    use Core\Database;
    //
    //    $config = require base_path("config.php");
    //    $db = new Database($config['database']);

    use Core\App;
    $db = App::resolve('Core\Database');

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

    // poopceno u authorize helper fn
    // if ($note['user_id'] != $currentUserId){
    //     // import status codea ('magic numbera') iz Response klase
    //     abort(Response::FORBIDDEN);
    // }

    authorize($note['user_id'] == $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);