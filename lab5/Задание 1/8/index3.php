<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 8.3</title>
</head>

<body>

    <?php
    $array = [
        [2, 4, 5],
        [1, 2, 3],
        [0, 1, 1],
        [5, 7, 1]
    ];

    usort($array, function($a, $b) {
        return array_sum($a) - array_sum($b);
    });


    echo "Отсортированный массив: <br>";
    echo "<ul>";
    foreach ($array as $subarray) {
        echo "<li>" . implode(", ", $subarray) . "   Сумма= " . array_sum($subarray) . "</li>";
    }
    echo "</ul>";
    ?>

</body>

</html>
