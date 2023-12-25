<?php
// Проверка наличия сессии
session_start();

// Проверка аутентификации
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление статьи</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Добавление статьи</h1>

    <form action="process_post.php" method="post" enctype="multipart/form-data">
        <!-- Добавим атрибут enctype для поддержки загрузки файлов -->

        <label for="title">Заголовок:</label>
        <input type="text" name="title" required><br>

        <label for="content">Содержание:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <label for="author">Автор:</label>
        <input type="text" name="author" required><br>

        <label for="image">Изображение:</label>
        <input type="file" name="image"><br>
        <!-- Добавим поле для выбора файла -->

        <input type="submit" value="Опубликовать">
    </form>

    <a href="admin_panel.php">Вернуться в административную панель</a>
    <a href="delete_post.php">Удалить статью</a> <!-- Добавьте ссылку на страницу удаления -->
</body>
</html>
