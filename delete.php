<?php

$id = $_GET['id'];
if ($id === '') {
    echo 'Ошибка удаления';
    exit();
}

require_once 'db_config.php';
$pdo = new dbConnect();

$params = [[$_GET['id']]];

$sql = 'DELETE FROM justdoit WHERE id = ?';  //удаление строки из БД
$pdo->query($sql, $params);

header('Location: index.php');