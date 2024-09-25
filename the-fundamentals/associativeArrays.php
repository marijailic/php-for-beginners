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
    ]
];

// ********************************************************
// kreiranje asocijativnog polja sa array
$assocArray1 = array("key1" => "value1", "key2" => "value2");
// kreiranje asocijativnog polja - shorthand sa []
$assocArray2 = ["key1" => "value1", "key2" => "value2"];

// ********************************************************
$keyExists = "Nope!";
// provjeravanje postoji li key u asocijativnog polju
if (array_key_exists('key1', $assocArray1)) {
    $keyExists = "Yup!";
}

// ********************************************************
// uzimanje svih keyeva i valueva iz asocijativnog polja
$keys = array_keys($assocArray1);
$values = array_values($assocArray1);

// ********************************************************
// merge asocijativnih polja
$arrayToMerge1 = ["a"=>"apple", "b"=>"banana"];
$arrayToMerge2 = ["c"=>"blueberry", "d"=>"cherry"];
$mergedArray = array_merge($arrayToMerge1, $arrayToMerge2);

// ********************************************************
// merge obicnih polja (indexed array)
$indexedArray1 = [1,2];
$indexedArray2 = [3,4];
// array_merge radi i za obicna polja
$mergedIndexedArrays = array_merge($indexedArray1, $indexedArray2);

// ********************************************************
// sortiranje asocijativnih polja

// sortiranje po valuevima reversed
arsort($mergedArray);

// sortiranje po valuevima
asort($mergedArray);

// sortiranje po keyevima reversed
krsort($mergedArray);

// sortiranje po keyevima
ksort($mergedArray);

// ********************************************************
// pretvaranje asocijativnog polja u json
$json = json_encode($mergedArray);

require "associativeArrays.view.php";