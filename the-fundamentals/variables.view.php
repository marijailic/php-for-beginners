<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Variables</title>
</head>

<body>

    <h1>Variables</h1>

    <h4><?php echo $concatenatedString; ?></h4>

    <!-- html tagovi se mogu printati u echo -->
    <?php echo '<u>I can print html tags in echo!</u>'; ?>
    <br><br>

    <?php echo "Line." ?>
    <!-- /n nije novi red -->
    <?php // echo "/n" ?>
    <!-- <br> je novi red -->
    <?php echo "<br>" ?>
    <?php echo "New line." ?>
    <br><br>

    <?php echo $concatenatedStrWithNum; ?>
    <br>
    <?php echo $doubleQuotes; ?>
    <br>
    <?php echo $singleQuotes; ?>
    <br><br>

    <!-- magic strings -->
    <?php echo '$assignedNumber' . ' -> ' . $assignedNumber . '<br>'; ?>
    <!-- ovo ne radi jer $assignedNumber sadrzi vrijednost, ne naziv varijable -->
    <?php // echo '$$assignedNumber' . ' ' . $$assignedNumber . '<br>'; ?>
    <?php echo '$variableName' . ' -> ' . $variableName . '<br>'; ?>
    <?php echo '$$variableName' . ' -> ' . $$variableName . '<br>'; ?>


</body>
</html>