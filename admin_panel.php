<?php
// Проверка наличия сессии
session_start();

// Проверка аутентификации
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit;
}

// Если пользователь аутентифицирован, отобразить административную панель
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Административная панель</h1>

    <a href="create_post_form.php">Добавить статью</a>
    <br>
    <a href="index.php">Главная</a>
    <br>
    <a href="logout.php">Выйти</a>
</body>
</html>
