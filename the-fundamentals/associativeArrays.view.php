<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Associative Arrays</title>
</head>

<body>

    <h1>Associative Arrays</h1>

    <ul>
        <!-- ispis asocijativnog polja -->
        <?php foreach ($books as $book): ?>
            <li>
                <a href="<?= $book["purchaseUrl"] ?>">
                    <?= $book["name"] ?> (<?= $book["published"] ?>) By - <?= $book["author"] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- ispis asocijativnog polja -->
    <?php
        foreach ($assocArray1 as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }
    ?>
    <br>

    <!-- provjeravanje postoji li key u asocijativnog polju -->
    <?= $keyExists ?>
    <br><br>

    <!-- uzimanje svih keyeva i valueva iz asocijativnog polja -->
    <?php print_r($keys) ?>
    <br>

    <?php print_r($values) ?>
    <br><br>

    <!-- merge asocijativnih polja -->
    <?php print_r($arrayToMerge1) ?>
    <br>

    <?php print_r($arrayToMerge2) ?>
    <br>

    <?php print_r($mergedArray) ?>
    <br><br>

    <!-- merge obicnih polja (indexed array) -->
    <?php print_r($indexedArray1) ?>
    <br>

    <?php print_r($indexedArray2) ?>
    <br>

    <?php print_r($mergedIndexedArrays) ?>
    <br><br>

    <!-- sortiranje asocijativnih polja -->
    <?php print_r($mergedArray) ?>
    <br><br>

    <!-- pretvaranje asocijativnog polja u json -->
    <?= $json ?>

</body>
</html>