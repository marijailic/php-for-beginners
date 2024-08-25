<?php

    //    use Core\Database;
    //
    //    $config = require base_path("config.php");
    //    $db = new Database($config['database']);

    // instanciranje baze preko containera
    use Core\App;
    // $db = App::container()->resolve('Core\Database');
    // inline
    // $db = App::container()->resolve(\Core\Database::class);
    // dodana resolve funkcija u App; vraca container i poziva resolve nad njim
    $db = App::resolve('Core\Database');

    $currentUserId = 4;

    $note = $db->query('select * from notes where id= :id', [
        'id' => $_POST['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id= :id', [
        'id' => $_POST['id']
    ]);

    header('Location: /notes');
    exit();