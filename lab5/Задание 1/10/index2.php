<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 10.2</title>
</head>

<body>

    <?php
    $text = 'aaa bbb, ccc. Xxx - eee bbb, kkk!';

    preg_match_all('/\b\w+\b/', $text, $matches);

    //данная группа захвата одна
    $words = $matches[0];

    echo "Массив слов:<br>";
    print_r($words);
    ?>

</body>

</html>
