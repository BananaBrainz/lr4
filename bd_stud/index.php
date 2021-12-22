<html>
<head><title> Сведения о Студентах </title></head>
<body>
<h2>Сведения о Студентах:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Факультет</th>
        <th>Группа</th>
        <th>Номер зачетки</th>
        <th>Телефон</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_st, fio_st, fac_st, group_st, num_st, tel_st
FROM stud");
    mysqli_select_db($link, "stud");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_st'] . "</td>";
        echo "<td>" . $row['fio_st'] . "</td>";
        echo "<td>" . $row['fac_st'] . "</td>";
        echo "<td>" . $row['group_st'] . "</td>";
        echo "<td>" . $row['num_st'] . "</td>";
        echo "<td>" . $row['tel_st'] . "</td>";
        echo "<td><a href='edit_stud.php?id_st=" . $row['id_st']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "<td><a href='delete_stud.php?id_st=" . $row['id_st']
            . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего Студентов: $num_rows </p>");
    ?>
    <p><a href="new_stud.php"> Добавить Студента</a>
    <p><a href="ved.php">Зачетная ведомость</a>
    <p><a href="subj.php">Предмет</a>
    <p><a href="gen_pdf.php">Скачать pdf-файл</a>
    <p><a href="gen_xls.php">Скачать xls-файл</a>
</body>
</html>