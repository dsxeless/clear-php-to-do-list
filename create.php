<?php

$pdo = new PDO('mysql:host=localhost;dbname=todo_db', 'username', 'password');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $pdo->prepare('INSERT INTO tasks (title) VALUES (?)')->execute([$title]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить задачу</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Добавить новую задачу</h1>
        <form method="POST">
            <input type="text" name="title" required placeholder="Введите название задачи">
            <button type="submit">Сохранить</button>
        </form>
        <div class="nav-links">
            <a href="index.php">Назад</a>
        </div>
    </div>
</body>
</html>
