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

// funkcija za filtriranje knjiga prema autoru
function filterByAuthor($books, $author){
    $filteredBooks = [];
    foreach($books as $book){
        if($book["author"] == $author){
            $filteredBooks[] = $book;
        }
    }
    return $filteredBooks;
}

require "functionsAndFilters.view.php";