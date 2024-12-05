<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['recipient'])) {
    header('Location: chat.php');
    exit();
}

$recipient = $_GET['recipient'];

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

// Получение сообщений между текущим пользователем и получателем
$stmt = $pdo->prepare("SELECT * FROM messages WHERE (user = ? AND recipient = ?) OR (user = ? AND recipient = ?) ORDER BY timestamp ASC");
$stmt->execute([$_SESSION['username'], $recipient, $recipient, $_SESSION['username']]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $message) {
    echo '<div class="incoming_msg' . ($message['user'] === $_SESSION['username'] ? ' outgoing_msg' : '') . '">';
    echo '<div class="received_msg' . ($message['user'] === $_SESSION['username'] ? ' sent_msg' : ' received_withd_msg') . '">';
    echo '<p>' . htmlspecialchars($message['message']) . '</p>';
    echo '<span class="time_date">' . htmlspecialchars($message['timestamp']) . '</span>';
    echo '</div>';
    echo '</div>';
}
?>