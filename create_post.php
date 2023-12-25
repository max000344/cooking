<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать пост</title>
</head>
<body>
    <h1>Создать новый пост</h1>

    <form action="process_post.php" method="post">
        <label for="title">Заголовок:</label>
        <input type="text" name="title" required><br>

        <label for="content">Содержание:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <label for="author">Автор:</label>
        <input type="text" name="author" required><br>

        <input type="submit" value="Опубликовать">
    </form>

</body>
</html>
