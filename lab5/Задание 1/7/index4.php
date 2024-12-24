<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 7.4</title>
</head>

<body>

    <?php
    $inputFile = 'input4.txt';
    $outputFile = 'output4.txt';

    if (!file_exists($inputFile)) {
        die("Исходный файл не найден.");
    }

    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $result = "";

    $pattern = '/(\d+\/\d+)/';

    foreach ($lines as $line) {
        $line = preg_replace($pattern, '<span>$1</span>', $line);
        
        $result .= $line . PHP_EOL;
    }

    file_put_contents($outputFile, $result);

    echo "Обработанный файл записан в '$outputFile'";
    ?>

</body>

</html>
