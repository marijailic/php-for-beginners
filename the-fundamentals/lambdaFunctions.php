<?php

$books = [
    [
        "name" => "1984",
        "published" => 1949,
        "author" => "George Orwel",
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "Animal Farm",
        "published" => 1945,
        "author" => "George Orwel",
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "Homage to Catalonia",
        "published" => 1938,
        "author" => "George Orwel",
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "The Hitchhiker's Guide to the Galaxy",
        "published" => 1979,
        "author" => "Douglas Adams",
        "purchaseUrl" => "https://example.com"
    ]
];

// funkcija za filtriranje po kljucu i vrijednosti
//    function filter($items, $key, $value){
//        $filteredItems = [];
//        foreach($items as $item){
//            // kao i u js == usporeduje vrijednosti bez obzira na tip
//            // === usporeduje vrijednosti i uzima u obzir tip
//            if($item[$key] === $value) {
//                $filteredItems[] = $item;
//            }
//        }
//        return $filteredItems;
//    }
//
//    $filteredBooks = filter($books, "author", "George Orwel");

// funkcija za filtriranje po kljucu i vrijednosti
// prima funkciju kao parametar
function filter($items, $fn){
    $filteredItems = [];
    foreach($items as $item){
        if($fn($item)){
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

// prosljedivanje anonimne (lambda) funkcije kao argument drugoj funkciji
$filteredBooks = filter($books, function($book){
    return $book["published"] < 1950;
});

require "lambdaFunctions.view.php";