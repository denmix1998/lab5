<?php

$host = 'localhost';
$dbname = 'my_db';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $passwordInput = '';
$emailError = $passwordError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $passwordInput = trim($_POST['password']);

    if (empty($email)) {
        $emailError = 'E-mail не может быть пустым';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Введите корректный e-mail';
    }

    if (empty($passwordInput)) {
        $passwordError = 'Пароль не может быть пустым';
    }

    if (!$emailError && !$passwordError) {
        
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($passwordInput, $user['password'])) {
                header("Location: https://nvsu.ru/");
                exit();
            } else {
                $passwordError = 'Неверный пароль';
            }
        } else {
            $emailError = 'Пользователь с таким e-mail не найден';
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход на сайт</title>
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

        input[type="email"],
        input[type="password"] {
            display: block;
            width: 80%;
            height: 27px;
            margin-bottom: 10px;
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="email"].error,
        input[type="password"].error {
            border-color: red;
        }

        input[type="submit"] {
            display: block;
            width: 80%;
            height: 45px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
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

    <h1>Вход на сайт</h1>

    <?php
    if ($emailError || $passwordError) {
        echo "<p style='color: red;'>Ошибка входа. Попробуйте снова.</p>";
    }
    ?>

    <form action="authorization.php" method="POST">
        
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

        <input type="submit" value="ВОЙТИ">
    </form>

</body>

</html>
