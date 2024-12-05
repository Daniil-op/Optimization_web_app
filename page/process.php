<?php
// Подключение к базе данных
$host = 'localhost';
$db = 'g95200tg_bd';
$user = 'g95200tg_bd';
$password = 'Harden13!';
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);

// Обработка отправленного сообщения
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $message = $_POST['message'];

    // Вставка сообщения в базу данных
    $stmt = $pdo->prepare("INSERT INTO messages (user, message) VALUES (?, ?)");
    if ($stmt->execute([$user, $message])) {
        echo 'Message sent successfully';
    } else {
        echo 'Failed to send message';
    }
}
?>
