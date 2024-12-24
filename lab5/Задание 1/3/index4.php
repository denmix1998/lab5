<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 3.4</title>
</head>

<body>

    <?php
    $arr1 = [1, 2, 3];
    $arr2 = [1, 2, 3, 4, 5];

    $arr2 = array_slice($arr2, 0, count($arr1));
    
    
    echo "Массив arr1: <br>";
    print_r($arr1);
    echo "<br><br>";
    
    echo "Массив arr2: <br>";
    print_r($arr2);
    ?>

</body>

</html>
