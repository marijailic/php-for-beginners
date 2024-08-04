<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lambda Functions</title>
</head>

<body>

    <h1>Lambda Functions</h1>

    <ul>
        <?php foreach ($filteredBooks as $book): ?>
            <li>
                <a href="<?= $book["purchaseUrl"] ?>">
                    <?= $book["name"] ?> (<?= $book["published"] ?>) - By <?= $book["author"] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>