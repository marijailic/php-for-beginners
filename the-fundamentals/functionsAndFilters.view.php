<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Functions And Filters</title>
</head>

<body>

    <h1>Functions And Filters</h1>

    <ul>
        <?php foreach (filterByAuthor($books, "Douglas Adams") as $book): ?>
            <li>
                <a href="<?= $book["purchaseUrl"] ?>">
                    <?= $book["name"] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>