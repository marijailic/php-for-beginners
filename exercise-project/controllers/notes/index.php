<?php

    //    use Core\Database;
    //
    //    $config = require base_path("config.php");
    //    $db = new Database($config['database']);

    use Core\App;
    $db = App::resolve('Core\Database');

    $notes = $db->query('select * from notes where user_id=4')->get();

    view("notes/index.view.php", [
        'heading' => 'My Notes',
        'notes' => $notes
    ]);
