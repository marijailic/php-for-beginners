<?php

    $books = [
        "Love is a dog from hell",
        "Post Office",
        "Pulp"
    ];

    // ********************************************************
    // dodavanje u polje
    //

    $addedNumbers = [1,2,3,4,5];

    // dodavanje na kraj polja
    array_push($addedNumbers, 9,10);

    // druga sintaksa za dodavanje na kraj polja
    $addedNumbers[] = 6;

    // dodavanje na pocetak polja
    array_unshift($addedNumbers,0);

    // dodavanje na specificnu poziciju (po indeksu polja)
    array_splice($addedNumbers,3,0, 11);

    // ********************************************************
    // uklanjanje iz polja
    //

    $removedNumbers = $addedNumbers;

    // uklanjanje elementa iz polja po indeksu
    // polje se ne reindeksira
    unset($removedNumbers[3]);

    // reindeksiranje polja nakon uklanjanja elementa sa unset
    $removedNumbers = array_values($removedNumbers);

    // uklanjanje elemenata iz polja po indeksu
    // drugi parametar govori koliko elemenata se uklanja
    array_splice($removedNumbers,2,2);

    // uklanjanje elemenata po vrijednosti
    $removedNumbers = array_diff($removedNumbers,[6]);


    $numbers = [1,2,3,4,5];

    // ********************************************************
    // array_map
    //

    $squared = array_map(function ($num) {
        return $num * $num . " ";
    }, $numbers);

    // ********************************************************
    // map sa arrow funkcijom
    //

    // $squared = array_map(fn($num) => $num * $num, $numbers);

    // ********************************************************
    // array_filter
    //

    $even = array_filter($numbers,fn($num) => $num % 2 === 0);

    // ********************************************************
    // array_reduce
    //

    $sum = array_reduce($numbers,fn($carry,$item) => $carry + $item, 0);


    require "arrays.view.php";