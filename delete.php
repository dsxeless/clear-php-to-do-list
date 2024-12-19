<?php

$pdo = new PDO('mysql:host=localhost;dbname=todo_db', 'username', 'password');

if (isset($_GET['id'])) {
    $pdo->prepare('DELETE FROM tasks WHERE id = ?')->execute([$_GET['id']]);
}
header('Location: index.php');
exit;
?>
