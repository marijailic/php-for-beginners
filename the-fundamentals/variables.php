<?php

    // varijablama se dinamicki odreduje tip
    $greeting = "Hello";
    $rating = 5;

    // konkatinacija stringova pomocu .
    $concatenatedString = $greeting . " " . "World!";

    // konkatinacija stringova sa brojevima
    $concatenatedStrWithNum = "PHP is" . " " . $rating . "/5.";

    // sa "" mogu ispisivati varijable unutar stringa
    $doubleQuotes = "PHP is $rating/5.";

    // sa '' ne mogu ispisivati varijable unutar stringa
    $singleQuotes = 'PHP is $rating/5.';


    // having fun - magic strings
    // dodjeljivanje broja varijabli
    $numberVar = 5;
    // dodjeljivanje imena varijable u stringu varijabli
    $variableName = "numberVar";
    // dodjeljivanje vrijednosti varijable
    $assignedNumber = $numberVar;
    // $$variableName -> $($variableName) -> $("numberVar") -> $numberVar -> 5


    require "variables.view.php";
