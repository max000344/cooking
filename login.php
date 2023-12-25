<?php
session_start();

// Проверяем, аутентифицирован ли уже пользователь
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    header('Location: admin_panel.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Вход</h1>

    <form action="process_login.php" method="post">
        <label for="username">Логин:</label>
        <input type="text" name="username" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Войти">
    </form>
    <a href="index.php">Главная</a>

</body>
</html>
