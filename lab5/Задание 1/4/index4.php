<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 4.4</title>
</head>

<body>

    <?php
    function sliceString($length, $string) {
        if (mb_strlen($string, 'UTF-8') > $length) {
            return mb_substr($string, 0, $length, 'UTF-8');
        }
        return $string;
    }


    $number = 10;
    $text = "Пример строки, строки пример";

    $result = sliceString($number, $text);

    echo "Обрезанная строка: $result";
    ?>

</body>

</html>
