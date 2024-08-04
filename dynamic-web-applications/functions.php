<?php

    // dump and die funkcija
    function dd($value){
        // <pre> formatira output da bude citljiv
        echo "<pre>";
        // var_dump ispisuje strukturirane informacije
        var_dump($value);
        echo "</pre>";
        // die() zaustavlja daljnju egzekuciju
        die();
    }

    // $_SERVER je superglobal array
    // dd($_SERVER);

    // echo $_SERVER["REQUEST_URI"];

    function urlIs($value){
        return $_SERVER["REQUEST_URI"] === $value;
    }