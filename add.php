<?php

require_once 'db_config.php';
$task = $_POST['task'];
$time = $_POST['time'];
$prior = $_POST['priority'];

if(($task === '') || ($time === '') || ($prior === '')) {
    echo 'Не введена задача/время/приоритет';
    exit();
}
if(preg_match(REGEX, $time))
{
    list($day, $month, $year) = explode(':', $time);
    if (!(checkdate($month, $day, $year)) || $year < 2023)
    {
        echo 'Проверьте логичность введенной даты';
        exit();
    }
}
else
{
    echo 'Неверный формат даты!';
    exit();
}

$pdo = new dbConnect();

$params = [[$_POST['task']]];
$params[] = [$_POST['time']];
$params[] = [$_POST['priority']];


$sql = 'INSERT INTO justdoit(task, deadline, priority) VALUES (?, ?, ?)';  //внесение данных в таблицу
$pdo->query($sql, $params);

header('Location: index.php');

