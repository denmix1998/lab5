<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 10.1</title>
</head>

<body>

    <?php
    function toPlural($word) {

        $exceptions = [
            'child' => 'children',
            'man' => 'men',
            'woman' => 'women',
            'mouse' => 'mice',
            'touth' => 'teeth',
            'foot' => 'feet',
            'ox' => 'oxen',
            'sheep' => 'sheep',
            'deer' => 'deer',
            'swine' => 'swine',
            'goose' => 'geese',

        ];

        if (array_key_exists($word, $exceptions)) {
            return $exceptions[$word];
        }

        if (preg_match('/(s|x|z|ch|sh)$/i', $word)) {
            return $word . 'es';
        }

        if (preg_match('/y$/i', $word)) {
            return substr($word, 0, -1) . 'ies';
        }

        return $word . 's';
    }


    $singular1 = 'city';
    $singular2 = 'word';
    $singular3 = 'man';
    $singular4 = 'box';
    $plural1 = toPlural($singular1);
    $plural2 = toPlural($singular2);
    $plural3 = toPlural($singular3);
    $plural4 = toPlural($singular4);
    
    echo "Существительное 1 в единственном числе: $singular1<br>";
    echo "Существительное 1 во множественном числе: $plural1<br><br>";

    echo "Существительное 2 в единственном числе: $singular2<br>";
    echo "Существительное 2 во множественном числе: $plural2<br><br>";

    echo "Существительное 3 в единственном числе: $singular3<br>";
    echo "Существительное 3 во множественном числе: $plural3<br><br>";

    echo "Существительное 4 в единственном числе: $singular4<br>";
    echo "Существительное 4 во множественном числе: $plural4<br><br>";

    ?>

</body>

</html>
