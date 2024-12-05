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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender = $_SESSION['username'];
    $message = $_POST['message'];
    $timestamp = date('Y-m-d H:i:s');

    // Вставка сообщения в базу данных
    $stmt = $pdo->prepare("INSERT INTO messages (user, recipient, message, timestamp) VALUES (?, ?, ?, ?)");
    $stmt->execute([$sender, $recipient, $message, $timestamp]);

    // Отправка ответа сервером
    echo json_encode(['status' => 'success']);
    exit();
}

// Получение сообщений между текущим пользователем и получателем
$stmt = $pdo->prepare("SELECT * FROM messages WHERE (user = ? AND recipient = ?) OR (user = ? AND recipient = ?) ORDER BY timestamp ASC");
$stmt->execute([$_SESSION['username'], $recipient, $recipient, $_SESSION['username']]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Чат с <?= htmlspecialchars($recipient) ?></title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
            width: 800px; /* Увеличена ширина чата */
            height: 80vh;
            background-color: #2F2F2F;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .chat_header {
            background-color: #1DA1F2;
            color: #fff;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
        }
        .chat_header .back_btn {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 20px;
            margin-right: 15px;
        }
        .chat_header img {
            border-radius: 20%;
            margin-right: 15px;
            width: 70px;
            height: 65px;
        }
        .chat_header .username {
            font-size: 18px;
            font-weight: bold;
        }
        .mesgs {
            float: left;
            padding: 20px;
            height: 390px;
            width: 750px;
            position: relative;
        }
        .msg_history {
            max-height: calc(100% - 80px);
            overflow-y: auto;
            padding-right: 15px; /* Добавляем отступ для скрытой полосы прокрутки */
        }
        .msg_history::-webkit-scrollbar {
            width: 0; /* Скрываем полосу прокрутки в WebKit-браузерах */
        }
        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }
        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #fff;
            font-size: 20px;
            min-height: 48px;
            width: 80%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 15px;
        }
        .msg_send_btn {
            background: #1DA1F2 none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 60px;
            position: absolute;
            right: 30px;
            top: 20px;
            width: 60px;
        }
        .incoming_msg {
            margin: 10px 0;
            overflow: hidden;
        }
        .received_msg {
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            background-color: #e4e8fb;
            color: #646464;
            font-size: 14px;
            max-width: 70%;
            word-wrap: break-word;
        }
        .outgoing_msg {
            overflow: hidden;
            margin: 10px 0;
        }
        .sent_msg {
            float: right;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            background-color: #3F51B5;
            color: #fff;
            font-size: 14px;
            max-width: 70%;
            word-wrap: break-word;
        }
        .time_date {
            color: #fff;
            display: block;
            font-size: 10px;
            margin: 5px 0 0;
        }
        .sender_name {
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="inbox_msg">
        <div class="chat_header">
            <button class="back_btn" onclick="window.location.href='chat.php'">&#8592;</button>
            <img src="path_to_recipient_photo.jpg" alt="<?= htmlspecialchars($recipient) ?>">
            <span class="username"><?= htmlspecialchars($recipient) ?></span>
        </div>
        <div class="mesgs">
            <div class="msg_history" id="msg_history">
                <?php
                $previous_user = null;
                foreach ($messages as $message):
                    $current_user = $message['user'];
                ?>
                    <div class="<?= $current_user === $_SESSION['username'] ? 'outgoing_msg' : 'incoming_msg' ?>">
                        <div class="<?= $current_user === $_SESSION['username'] ? 'sent_msg' : 'received_msg' ?>">
                            <?php if ($current_user !== $previous_user): ?>
                                <div class="sender_name"><?= htmlspecialchars($current_user) ?></div>
                                <?php $previous_user = $current_user; ?>
                            <?php endif; ?>
                            <p><?= htmlspecialchars($message['message']) ?></p>
                            <span class="time_date"><?= htmlspecialchars($message['timestamp']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="type_msg">
                <div class="input_msg_write">
                    <form id="message-form" method="post" action="">
                        <input type="text" class="write_msg" name="message" placeholder="Введите сообщение" required />
                        <button class="msg_send_btn" type="submit"><i></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('message-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.action, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        this.reset();
                        updateChat();
                    }
                }
            }.bind(this);
            xhr.send(formData);
        });

        function updateChat() {
            var msgHistory = document.getElementById('msg_history');
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'update.php?recipient=<?= urlencode($recipient) ?>', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    msgHistory.innerHTML = xhr.responseText;
                    msgHistory.scrollTop = msgHistory.scrollHeight; // Автоматическая прокрутка к последнему сообщению
                }
            };
            xhr.send();
        }

        // Обновление чата каждые 5 секунд
        setInterval(updateChat, 2000);
    </script>
</body>
</html>
