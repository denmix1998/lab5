<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 7.3</title>
</head>

<body>

    <?php
    $inputFile = 'input3.txt';
    $outputFile = 'output3.txt';


    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $result = "";

    foreach ($lines as $line) {
        $words = explode(' ', $line);
        $modifiedWords = array_map(function($word) {
            return "<span>$word</span>";
        }, $words);
        $result .= implode(' ', $modifiedWords) . PHP_EOL;
    }

    file_put_contents($outputFile, $result);

    echo "Обработанный файл записан в '$outputFile'";
    ?>

</body>

</html>
