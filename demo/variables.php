<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>
<body>

<h1>
    <?php
        // varijablama se dinamicki odreduje tip
        $greeting = "Hello";
        $rating = 5;

        echo $greeting . " " . "World!"; // konkatinacija stringova sa .
    ?>
</h1>
<p>
    <?php
        echo '<u>I can print html tags in echo!</u>'; // mogu koristiti html tagove u echou

        // echo "\n"; // ovo ne radi u htmlu
        echo "<br>"; // idem u novi red preko htmla u echou

        echo "PHP is" . " " . $rating . "/5."; // mogu konkatinirati string s brojem
        echo '<br>';

        echo "PHP is $rating/5."; // sa "" mogu ispisivati varijable unutar stringa
        echo '<br>';
        echo 'PHP is $rating/5.'; // sa '' ne mogu ispisivati varijable unutar stringa
    ?>
</p>
<p>
    <?php
        // having fun with php
        $anotherMagicVar = 5;
        $magicVar = "anotherMagicVar";
        $assignedMagicVar = $anotherMagicVar;

        echo '$assignedMagicVar' . ' -> ' . $assignedMagicVar . '<br>';
        // echo '$$assignedMagicVar' . ' ' . $$assignedMagicVar . '<br>'; // ovo ne radi
        echo '$magicVar' . ' -> ' . $magicVar . '<br>';
        echo '$$magicVar' . ' -> ' . $$magicVar . '<br>';
        // $$magicVar -> $($magicVar) -> $("anotherMagicVar") -> $anotherMagicVar -> 5
    ?>
</p>

</body>
</html>