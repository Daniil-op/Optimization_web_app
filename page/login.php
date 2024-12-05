<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подключение к базе данных
    $host = 'localhost';
    $db = 'g95200tg_bd';
    $user = 'g95200tg_bd';
    $db_password = 'Harden13!';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Проверка, существует ли пользователь
        $stmt = $pdo->prepare("SELECT * FROM human WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['username'] = $username;
            header('Location: chat.php');
            exit();
        } else {
            // Если пользователь не существует, создаем нового пользователя
            $stmt = $pdo->prepare("INSERT INTO human (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $password]);

            $_SESSION['username'] = $username;
            header('Location: chat.php');
            exit();
        }
    } catch (PDOException $e) {
        die("Ошибка подключения к базе данных: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход в чат</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('background.jpg'); /* Добавьте свой фон */
            background-size: cover;
            background-position: center;
        }
        .login-container {
            background-color: rgba(32, 33, 36, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #1da1f2;
        }
        input[type="text"], input[type="password"] {
            width: 93%;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            background-color: rgba(51, 51, 51, 0.8);
            color: #ffffff;
            font-size: 16px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
        }
        input[type="text"]:focus, input[type="password"]:focus {
            background-color: rgba(51, 51, 51, 0.6);
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.7);
        }
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background-color: #1da1f2;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #1a8cd8;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Вход в чат</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Введите ваше имя" required>
            <input type="password" name="password" placeholder="Введите пароль" required>
            <input type="submit" value="Войти">
        </form>
    </div>
</body>
</html>
