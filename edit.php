<?php

$pdo = new PDO('mysql:host=localhost;dbname=todo_db', 'username', 'password');

$task = $pdo->prepare('SELECT * FROM tasks WHERE id = ?');
$task->execute([$_GET['id']]);
$task = $task->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $pdo->prepare('UPDATE tasks SET title = ? WHERE id = ?')->execute([$title, $_GET['id']]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать задачу</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Редактировать задачу</h1>
        <form method="POST">
            <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required placeholder="Введите название задачи">
            <button type="submit">Сохранить</button>
        </form>
        <div class="nav-links">
            <a href="index.php">Назад</a>
        </div>
    </div>
</body>
</html>
