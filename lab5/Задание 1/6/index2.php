<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 6.2</title>
</head>

<body>

    <?php
    $arr = [
        ['href' => 'page1.html', 'text' => 'text1'],
        ['href' => 'page2.html', 'text' => 'text2'],
        ['href' => 'page3.html', 'text' => 'text3'],
    ];
    ?>

    <ul>
        <?php
        foreach ($arr as $item) {
            echo "<li><a href='{$item['href']}'>{$item['text']}</a></li>";
        }
        ?>
    </ul>

</body>

</html>
