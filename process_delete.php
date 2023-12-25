<?php
// Проверка наличия сессии
session_start();

// Проверка аутентификации
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $post_id = $_POST['post_id'];

    // Подключение к базе данных
    $db = new mysqli("localhost", "root", "", "cooking");

    // Проверка соединения
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Запрос на удаление статьи из базы данных
    $query = "DELETE FROM posts WHERE id = $post_id";

    if ($db->query($query) === TRUE) {
        echo "Статья успешно удалена!";
    } else {
        echo "Ошибка: " . $query . "<br>" . $db->error;
    }

    // Закрытие соединения с базой данных
    $db->close();
}
?>
