<?php

$pdo = new PDO('mysql:host=localhost;dbname=todo_db', 'username', 'password');

$tasks = $pdo->query('SELECT * FROM tasks')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Система управления задачами</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Список задач</h1>
        <a href="create.php">Добавить задачу</a>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <?php echo htmlspecialchars($task['title']); ?>
                    <div>
                        <a href="edit.php?id=<?php echo $task['id']; ?>">Редактировать</a>
                        <a href="delete.php?id=<?php echo $task['id']; ?>">Удалить</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
