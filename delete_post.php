<?php
// Проверка наличия сессии
session_start();

// Проверка аутентификации
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit;
}

// Подключение к базе данных
$db = new mysqli("localhost", "root", "", "cooking");

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Запрос на выборку всех статей
$query = "SELECT id, title FROM posts";
$result = $db->query($query);

// Закрытие соединения с базой данных
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление статьи</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Удаление статьи</h1>

    <form action="process_delete.php" method="post">
        <label for="post_id">Выберите статью для удаления:</label>
        <select name="post_id">
            <?php
                // Вывод статей в выпадающем списке
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['title']}</option>";
                }
            ?>
        </select><br>

        <input type="submit" value="Удалить">
    </form>

    <a href="admin_panel.php">Вернуться в административную панель</a>
</body>
</html>
