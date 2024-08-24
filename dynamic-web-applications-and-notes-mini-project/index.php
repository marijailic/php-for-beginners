<?php

    require "functions.php";
    require "Database.php";
    require "Response.php";
    require "router.php";

    // $config = require "config.php";
    // $db = new Database($config['database']);

    // $posts = $db->query("select * from posts")->fetchAll();
    // dd($posts);

    // $_GET je superglobal - uzimam query parametar
    // $id = $_GET["id"];

    // nikada ne inlineat user data u query string - SQL Injection
    // $query = "select * from posts where id = {$id}";
    // $post = $db->query($query)->fetch();

    // sql query s ?
    // $query = "select * from posts where id = ?";
    // $post = $db->query($query, [$id])->fetch();

    // sql query s keyem (:id), parametar je asocijativno polje
    // $query = "select * from posts where id = :id";
    // $post = $db->query($query, [':id' => $id])->fetch();

    // dd($post);