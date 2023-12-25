<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кулинарный блог</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">Кулинарный</span> блог</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="index.php">Главная</a></li>
                    <li><a href="admin_panel.php">Административная панель</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <!-- Первая статья -->
            <div class="article">
                <div class="article-image">
                    <img src="images/11.png" alt="Первое блюдо">
                </div>
                <div class="article-content">
                <h2>Салат "Цезарь"</h2>
<p>Простой и вкусный рецепт классического салата "Цезарь".</p>
<p><strong>Ингредиенты:</strong></p>
<ul>
    <li>1 кочан салата романо</li>
    <li>200 г куриного филе</li>
    <li>1 стакан черри-томатов</li>
    <li>1/2 стакана тертого пармезана</li>
    <li>1/2 стакана сухарей</li>
    <li>Соус Цезарь</li>
    <li>Соль, перец по вкусу</li>
</ul>
<p><strong>Рецепт:</strong></p>
<ol>
    <li>Подготовьте куринное филе, обжарьте его на сковороде до золотистой корки, нарежьте на полоски.</li>
    <li>Разрежьте листья салата, выложите на тарелку.</li>
    <li>Добавьте куриное филе, черри-томаты, посыпьте сухарями и пармезаном.</li>
    <li>Полейте соусом Цезарь, посолите, поперчите по вкусу.</li>
    <li>Тщательно перемешайте и подавайте.</li>
</ol>
                </div>
            </div>

            <!-- Вторая статья -->
            <div class="article">
                <div class="article-image">
                    <img src="images/2.png" alt="Второе блюдо">
                </div>
                <div class="article-content">
                    <h2>Паста с Лососем и Шпинатом</h2>
<p>Изысканное блюдо с сочным лососем и ароматным шпинатом.</p>
<p><strong>Ингредиенты:</strong></p>
<ul>
    <li>300 г спагетти</li>
    <li>200 г филе лосося</li>
    <li>2 стакана шпината</li>
    <li>3 зубчика чеснока, мелко нарезанных</li>
    <li>Сок половины лимона</li>
    <li>3 ст. ложки оливкового масла</li>
    <li>Соль, перец по вкусу</li>
</ul>
<p><strong>Рецепт:</strong></p>
<ol>
    <li>Отварите спагетти в подсоленной воде до готовности.</li>
    <li>Обжарьте лосось на сковороде до золотистой корки.</li>
    <li>Добавьте шпинат и чеснок, готовьте до того момента, пока шпинат не увянет.</li>
    <li>Добавьте отваренные спагетти, перемешайте.</li>
    <li>Полейте блюдо оливковым маслом, добавьте сок лимона, посолите и поперчите по вкусу.</li>
    <li>Тщательно перемешайте и подавайте.</li>
</ol>
                </div>
            </div>
        </div>
        <div class="container">

        <?php
// Подключение к базе данных
$db = new mysqli("localhost", "root", "", "cooking");

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Запрос на выборку всех статей
$query = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $db->query($query);

// Вывод статей
while ($row = $result->fetch_assoc()) {
    echo '<div class="article">';
    
    // Вывод изображения, если оно существует
    if (!empty($row['image_path'])) {
        echo '<div class="article-image">';
        echo '<img src="' . $row['image_path'] . '" alt="Изображение поста">';
        echo '</div>';
    }

    echo '<div class="article-content">';
    echo '<h2>' . $row['title'] . '</h2>';
    echo '<p>' . $row['content'] . '</p>';
    echo '<p>Автор: ' . $row['author'] . '</p>';
    echo '<p>Дата: ' . $row['created_at'] . '</p>';
    echo '</div>';
    
    echo '</div>';
}

// Закрытие соединения с базой данных
$db->close();
?>

    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 Кулинарный блог</p>
        </div>
    </footer>
</body>
</html>
