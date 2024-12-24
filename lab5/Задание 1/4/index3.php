<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 4.3</title>
</head>

<body>

    <?php
    function secondsToDays($seconds) {
        return intdiv($seconds, 86400);
    }

    $seconds = 100000;
    $days = secondsToDays($seconds);

    echo "Количество суток в $seconds секундах: $days";
    ?>

</body>

</html>
