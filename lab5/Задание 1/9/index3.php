<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 9.3</title>
</head>

<body>

    <?php
    $str = 'abcde abcde';
    
    $del = 'abe';
    
    $result = str_replace(str_split($del), '', $str);
    
    echo "Строка после удаления символов: $result";
    ?>

</body>

</html>
