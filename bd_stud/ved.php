<html>
<head><title>Зачетная ведомость</title></head>
<body>
<h2>Зачетная ведомость:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Дата сдачи</th>
        <th>Студент</th>
        <th>Предмет</th>
        <th>Оценка</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }
    $result = $mysqli->query("SELECT ved.id, ved.date_ved, stud.fio_st as stud, subj.name_sub as subj, ved.ocen
FROM ved 
LEFT JOIN stud ON ved.id_st=stud.id_st
LEFT JOIN subj ON ved.id_sub=subj.id_sub");

    $counter = 0;
    if ($result) {
        while ($row = $result->fetch_array()) {
            $id = $row['id'];
            $date_ved = $row['date_ved'];
            $stud = $row['stud'];
            $subj = $row['subj'];
            $ocen = $row['ocen'];

            echo "<tr>";
            echo "<td>$id</td><td>$date_ved</td><td>$stud</td><td>$subj</td><td>$ocen</td>";

            echo "<td><a href='edit_ved.php?id=" . $row['id']
                . "'>Редактировать</a></td>"; //Запуск редактирования
            echo "<td><a href='delete_ved.php?id=" . $row['id']
                . "'>Удалить</a></td>"; //запуск удаления
            echo "</tr>";
            $counter++;
        }
    }
    print "</table>";
    print("<p>Всего ОС: $counter </p>");
    ?>
    <p><a href="new_ved.php"> Добавить Зачет </a>
    <p><a href="index.php"> Вернуться назад </a>
</body>
</html>
