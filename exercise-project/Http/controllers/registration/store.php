<?php

    use Core\Validator;
    use Core\App;
    use Core\Database;

    $email = $_POST['email'];
    $password = $_POST['password'];

    // validate the form inputs

    $errors = [];
    if (!Validator::email($email)){
        $errors['email'] = 'Please provide a valid email address';
    }

    if (!Validator::string($password, 7, 255)){
        $errors['password'] = 'Please provide a password of at least seven characters';
    }

    if(!empty($errors)){
        view('registration/create.view.php', [
            'errors' => $errors
        ]);
    }

    $db = App::resolve(Database::class);

    // check if the account already exists

    $user = $db->query('select * from users where email = :email', [
        'email' => $email
    ])->find();

    if($user){
        // if yes, redirect to a login page
        header('location: /');
        exit();
    } else {
        // if not, save one to the database, and then log the user in, and redirect
        $db->query('insert into users (email, password) values (:email, :password)', [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        // mark that the user is logged in
        login([
            'email' => $email,
        ]);

        header('location: /');
        exit();
    }