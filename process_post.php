<?php
// Подключение к базе данных
$db = new mysqli("localhost", "root", "", "cooking");

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Проверка, был ли отправлен файл
if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';  // Папка для загруженных файлов
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    // Перемещение файла из временной директории в указанную
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

    // Сохранение пути к изображению в базе данных
    $imagePath = $uploadFile;
} else {
    $imagePath = '';  // Если файл не был загружен
}

// Получение данных из формы
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];

// SQL-запрос для вставки данных в базу данных
$sql = "INSERT INTO posts (title, content, author, image_path) VALUES ('$title', '$content', '$author', '$imagePath')";

if ($db->query($sql) === TRUE) {
    echo "Статья успешно добавлена";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

// Закрытие соединения с базой данных
$db->close();
?>
