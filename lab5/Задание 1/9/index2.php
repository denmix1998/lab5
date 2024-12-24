<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 9.2</title>
</head>

<body>

    <?php
    $html = '
        <a href="https://example.com">Example</a><br>
        <a href="https://code.mu/ru/php/tasker/stager/9/1/">My Site</a><br>
        <a href="https://google.com">Google</a><br>
    ';

    $myDomain = 'code.mu';

    $dom = new DOMDocument();
    @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $links = $dom->getElementsByTagName('a');

    foreach ($links as $link) {
        if ($link instanceof DOMElement) {
            $href = $link->getAttribute('href');
            if (strpos($href, $myDomain) === false) {
                $link->setAttribute('target', '_blank');
            }
        }
    }

    echo "Измененные ссылки:<br>";
    echo nl2br($dom->saveHTML());
    ?>

</body>

</html>
