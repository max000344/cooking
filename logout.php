<?php
// Проверка наличия сессии
session_start();

// Разрушение сессии и перенаправление на страницу входа
session_destroy();
header('Location: login.php');
?>
