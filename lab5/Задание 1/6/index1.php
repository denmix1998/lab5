<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номер 6.1</title>
</head>

<body>

    <form method="POST">
        <label for="dateInput">Введите дату:</label>
        <input type="date" id="dateInput" name="inputDate">
        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['inputDate'])) {
        $inputDate = $_POST['inputDate'];

        $currentYear = date("Y");

        $inputYear = date("Y", strtotime($inputDate));
        
        if ($inputYear == $currentYear) {
            echo "<p>Эта дата была уже в этом году.</p>";
        } else {
            echo "<p>Эта дата не была в этом году.</p>";
        }
    }
    ?>

</body>

</html>
