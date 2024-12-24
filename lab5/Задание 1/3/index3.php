<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 3.3</title>
</head>

<body>

    <?php
    $array = [
        [2, 1, 4, 3, 5],
        [3, 5, 2, 4, 1],
        [4, 3, 1, 5, 2],
    ];

    foreach ($array as &$subArray) {
        sort($subArray);
    }
    
    echo "Сортированный массив: <br>";
    print_r($array);
    ?>

</body>

</html>
