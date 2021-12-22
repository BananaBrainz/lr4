<html>
<head><title> Сведения о Предметах </title></head>
<body>
<h2>Сведения о Предметах:</h2>
<table border="1">
    <tr>
        <th>id Предмета</th>
        <th>Название</th>
        <th>Преподаватель</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
</tr>
<?php
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
$result = mysqli_query($link, "SELECT id_sub, name_sub, fio_subj FROM subj"); // запрос на выборку сведений о пользователях
mysqli_select_db($link, "subj");

while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
    echo "<tr>";
    echo "<td>" . $row['id_sub'] . "</td>";
    echo "<td>" . $row['name_sub'] . "</td>";
    echo "<td>" . $row['fio_subj'] . "</td>";
    echo "<td><a href='edit_subj.php?id_sub=" . $row['id_sub']
        . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
    echo "<td><a href='delete_subj.php?id_sub=" . $row['id_sub']
        . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
    echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего Предметов: $num_rows </p>");
?>
<p><a href="new_subj.php"> Добавить Предмет </a>
<p><a href="index.php"> Вернуться назад </a>
</body>
</html>