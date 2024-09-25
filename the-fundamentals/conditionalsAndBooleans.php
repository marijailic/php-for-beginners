<?php

$bookName = "Hitchhiker's guide to the galaxy";
$read = true;

// if-else
/*if($read){
    $message = "I have read $bookName.";
} else {
    $message = "I have not read $bookName.";
}*/

// ternarni operator
$message = $read ? "I have read $bookName." : "I have not read $bookName.";


$selectedBook = 6;

// switch
switch ($selectedBook) {
    case 1:
        $selectedBookStatement = "I have read Good Omens.";
        break;
    case 2:
        $selectedBookStatement = "I have read Dirk Gently's Holistic Detective Agency.";
        break;
    case 3:
        $selectedBookStatement = "I have read The Restaurant at the End of the Universe.";
        break;
    default:
        $selectedBookStatement = "I have not read any of the following books.";
        break;
}

require "conditionalsAndBooleans.view.php";