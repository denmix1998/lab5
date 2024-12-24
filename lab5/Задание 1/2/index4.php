<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 2.4</title>
</head>

<body>

    <?php
    $array = [1, 2, 3, 4, 5, 6];
    $half = floor(count($array) / 2);
    
    $sum = array_sum(array_slice($array, 0, $half));
    
    echo "Сумма первой половины элементов: $sum";
    ?>

</body>

</html>
