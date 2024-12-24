<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 2.3</title>
</head>

<body>

    <?php
    $array = [1, 3, 3, 4, 3, 6];
    $valueToRemove = 3;
    
    echo "Массив до удаления элемента $valueToRemove: <br>";
    print_r($array);
    echo "<br><br>";


    $array = array_filter($array, function($item) use ($valueToRemove) {
        return $item !== $valueToRemove;
    });
    
    
    $arrayNew = array_values($array);
    echo "Массив после удаления элемента $valueToRemove: <br>";
    print_r($arrayNew);
    ?>

</body>

</html>
