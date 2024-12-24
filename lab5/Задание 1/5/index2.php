<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 5.2</title>
</head>

<body>

    <?php
    $currentDate = new DateTime();
    $newYearDate = new DateTime('2025-01-01');

    $interval = $currentDate->diff($newYearDate)->days;

    echo "До Нового Года осталось " . $interval . " дней.";
    ?>

</body>

</html>
