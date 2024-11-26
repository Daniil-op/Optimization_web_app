<?php
// Устанавливаем заголовок Content-Type для указания, что ответ будет в формате JSON
header("Content-Type: application/json; charset=UTF-8");
// Подключаем файл с настройками подключения к базе данных
include 'db.php';

// Определяем метод HTTP-запроса (GET, POST, PUT, DELETE, OPTIONS)
$method = $_SERVER['REQUEST_METHOD'];

// Получаем данные из тела запроса (для POST, PUT и DELETE запросов)
$input = json_decode(file_get_contents('php://input'), true);

// Получаем параметр ID из URL (для GET и DELETE запросов)
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Получаем параметр table из URL для определения таблицы
$table = isset($_GET['table']) ? $_GET['table'] : null;

// В зависимости от метода запроса вызываем соответствующую функцию
switch ($method) {
    case 'GET':
        // Обработка GET-запроса
        handleGet($pdo, $id, $table);
        break;
    case 'POST':
        // Обработка POST-запроса
        handlePost($pdo, $input, $table);
        break;
    case 'PUT':
        // Обработка PUT-запроса
        handlePut($pdo, $input, $table);
        break;
    case 'DELETE':
        // Обработка DELETE-запроса
        if ($id) {
            handleDelete($pdo, $id, $table);
        } else {
            echo json_encode(['message' => 'Invalid request'], JSON_UNESCAPED_UNICODE);
        }
        break;
    case 'OPTIONS':
        // Обработка OPTIONS-запроса (preflight request для CORS)
        http_response_code(200);
        break;
    default:
        // Обработка неподдерживаемых методов запроса
        echo json_encode(['message' => 'Invalid request method'], JSON_UNESCAPED_UNICODE);
        break;
}

// Функция для обработки GET-запросов
function handleGet($pdo, $id, $table) {
    if ($id) {
        // Если передан параметр ID, выбираем запись по ID
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            // Если запись найдена, возвращаем её данные в формате JSON
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            // Если запись не найдена, возвращаем сообщение об ошибке
            echo json_encode(['message' => 'Record not found'], JSON_UNESCAPED_UNICODE);
        }
    } else {
        // Если параметр ID не передан, выбираем все записи
        $sql = "SELECT * FROM $table";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Возвращаем данные всех записей в формате JSON
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

// Функция для обработки POST-запросов
function handlePost($pdo, $input, $table) {
    if ($table === 'users') {
        // Вставляем нового пользователя в базу данных
        $sql = "INSERT INTO users (name, score) VALUES (:name, :score)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $input['name'], 'score' => $input['score']]);
        // Возвращаем сообщение об успешном создании пользователя
        echo json_encode(['message' => 'User created successfully'], JSON_UNESCAPED_UNICODE);
    } elseif ($table === 'questions') {
        // Вставляем новый вопрос в базу данных
        $sql = "INSERT INTO questions (title) VALUES (:title)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $input['title']]);
        // Возвращаем сообщение об успешном создании вопроса
        echo json_encode(['message' => 'Question created successfully'], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['message' => 'Invalid table'], JSON_UNESCAPED_UNICODE);
    }
}

// Функция для обработки DELETE-запросов
function handleDelete($pdo, $id, $table) {
    if ($table === 'users' || $table === 'questions') {
        // Удаляем запись из базы данных по ID
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        // Возвращаем сообщение об успешном удалении записи
        echo json_encode(['message' => 'Record deleted successfully'], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['message' => 'Invalid table'], JSON_UNESCAPED_UNICODE);
    }
}
?>
