<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Подключение к базе данных
$host = 'localhost';
$db = 'g95200tg_bd';
$user = 'g95200tg_bd';
$password = 'Harden13!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Получение списка пользователей
$stmt = $pdo->query("SELECT username FROM human");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Простой чат на PHP</title>
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
        }
        .chat-wrapper {
            display: flex;
            flex-direction: column;
            width: 400px;
            height: 600px;
            background-color: #202124;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .user-list {
            flex: 1;
            background-color: #202124;
            overflow-y: auto;
            padding: 10px;
        }
        .user-item {
            padding: 10px;
            border-bottom: 1px solid #333333;
            cursor: pointer;
        }
        .user-item:hover {
            background-color: #333333;
        }
        .chat-header {
            background-color: #1e1f22;
            padding: 10px;
            border-bottom: 1px solid #333333;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .chat-header .title {
            font-size: 18px;
            font-weight: bold;
        }
        .chat-header .options {
            display: flex;
            gap: 10px;
        }
        .chat-header .options a {
            color: #1da1f2;
            text-decoration: none;
        }
        .chat-header .options a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="chat-wrapper">
        <div class="chat-header">
            <div class="title">Кому будем писать?)</div>
            <div class="options">
                <a href="../index.php">Выйти</a>
            </div>
        </div>
        <div class="user-list">
            <?php foreach ($users as $user): ?>
                <?php if ($user['username'] !== $_SESSION['username']): ?>
                    <div class="user-item" data-username="<?= htmlspecialchars($user['username']) ?>">
                        <?= htmlspecialchars($user['username']) ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        document.querySelectorAll('.user-item').forEach(function(item) {
            item.addEventListener('click', function() {
                var recipient = this.getAttribute('data-username');
                if (recipient) {
                    window.open('chat_window.php?recipient=' + encodeURIComponent(recipient), '_blank');
                }
            });
        });
    </script>
</body>
</html>
