<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arrays</title>
</head>

<body>

    <h1>Arrays</h1>

    <ul>
        <!-- ispis polja -->
        <?php
            foreach ($books as $book) {
                // echo "<li>$book™</li>";
                // {} ako trebam staviti special character odmah uz varijablu
                echo "<li>{$book}™</li>";
            }
        ?>
    </ul>

    <ul>
        <!-- razlamanje phpa za templating -->
        <?php foreach ($books as $book): ?>
            <li><?= $book ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- dodavanje u polje -->
    <!-- polje se moze printati sa print_r -->
    <?php print_r($addedNumbers); ?>
    <br><br>

    <!-- uklanjanje iz polja -->
    <?php print_r($removedNumbers); ?>
    <br><br>

    <!-- array_map -->
    <?php print_r($squared); ?>
    <br><br>

    <!-- array_filter -->
    <?php print_r($even); ?>
    <br><br>

    <!-- array_reduce -->
    <?php print_r($sum); ?>

</body>
</html>