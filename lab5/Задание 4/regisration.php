<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрационная форма</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 300px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            height: 40px;
            margin-bottom: 10px;
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"].error,
        input[type="email"].error,
        input[type="password"].error {
            border-color: red;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            height: 45px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            height: 45px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h1>Регистрационная форма</h1>

    <?php
    $name = $email = $password = '';
    $nameError = $emailError = $passwordError = '';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Не удалось подлкючиться к БД: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = trim($_POST['name']);
        if (empty($name)) {
            $nameError = 'Имя не может быть пустым';
        }

        $email = trim($_POST['email']);
        if (empty($email)) {
            $emailError = 'E-mail не может быть пустым';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'Введите корректный e-mail';
        }

        $password = trim($_POST['password']);
        if (empty($password)) {
            $passwordError = 'Пароль не может быть пустым';
        }

        if (!$nameError && !$emailError && !$passwordError) {

            $name = mysqli_real_escape_string($conn, $name);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green; text-align: center;'>Регистрация успешна!</p>";
            } else {
                echo "Ошибка: " . $conn->error;
            }
        }
    }

    $conn->close();
    ?>

    <form action="regisration.php" method="POST">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" class="<?= $nameError ? 'error' : '' ?>">
        <?php if ($nameError): ?>
            <div class="error-message"><?= $nameError ?></div>
        <?php endif; ?>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" class="<?= $emailError ? 'error' : '' ?>">
        <?php if ($emailError): ?>
            <div class="error-message"><?= $emailError ?></div>
        <?php endif; ?>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" class="<?= $passwordError ? 'error' : '' ?>">
        <?php if ($passwordError): ?>
            <div class="error-message"><?= $passwordError ?></div>
        <?php endif; ?>

        <button type="submit">Регистрация</button>
    </form>

</body>

</html>
