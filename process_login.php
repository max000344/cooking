<?php
// Проверка наличия сессии
session_start();

// Установка отображения ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// admin/admin123
$valid_username = '1';
$valid_password = '1';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['authenticated'] = true;
        header('Location: create_post_form.php');
        exit;
    } else {
        echo "Неправильное имя пользователя или пароль.";
    }
}
?>
