<?php

    require "functions.php";
    // require "router.php";

    // dsn: data source name - connection string
    $dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
    $username = 'root';
    $password = 'root';

    // PDO: PHP Data Objects
    // -------------------------------------------------------------
    // database access layer koji pruza uniformne metode
    // za pristup bazama podataka
    // -------------------------------------------------------------
    // mogu koristiti iste funkcije za komunikaciju bez obzira
    // na bazu podataka koju koristim

    $pdo = new PDO($dsn, $username, $password);

    $statement = $pdo->prepare("select * from posts");

    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($posts as $post) {
        echo "<li>" . $post['title'] . "</li>";
    }