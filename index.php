<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список дел</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1>Список дел</h1>
    <form action="add.php" method="post">
        <input type="text" name="task" id="task" placeholder="Задача" class="teal">
        <input type="text" name="time" id="time" placeholder="Дедлайн" class="teal">
        <label for="choose one"><b>Выберите приоритет:</b></label>
        <select id="priority" name="priority">
            <option value="Высокий">Высокий</option>
            <option value="Средний">Средний</option>
            <option value="Низкий">Низкий</option>
        </select>
        <button type="submit" name="createTask" class="btn btn-success">Создать</button>
    </form>
</div>
    <table>
        <tr>
            <th>Задача:</th>
            <th>Выполнить до:</th>
            <th>Приоритет:</th>
        </tr>
    <?php
        require_once 'db_config.php';

        $pdo = new dbConnect();
        $query = $pdo->query("SELECT * FROM justdoit ORDER BY id");
        foreach($query as $i => $value)
        {
            $priority = $value['priority'];
            if ($priority == 'Высокий') {
                $class = 'high';
            } elseif ($priority == 'Средний') {
                $class = 'medium';
            } else {
                $class = 'low';
            }
            echo '<b><tr><td>'.$value['task'].'</td>';
            echo '<td>'.$value['deadline'].'</td>';
            echo "<td class='$class'>".$priority.'</td></b>';
            echo '<td><a href="delete.php?id='.$query[$i]['id'].'"><button class=delete-btn>Удалить</button></td></tr>';
        }
    ?>
        <form action="func.php">
        <button type="submit" name="createPDF" class="btn btn-success">Открыть в PDF</button>
</body>
</html>

