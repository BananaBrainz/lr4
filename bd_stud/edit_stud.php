<html>
<head>
    <title> Редактирование данных о Студентах </title>
</head>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_st = $_GET['id_st'];

$result = $mysqli->query("SELECT fio_st, fac_st, group_st, num_st, tel_st FROM stud WHERE id_st='$id_st'");
if ($result) {
    while ($gm = $result->fetch_array()) {
        $fio_st = $gm['fio_st'];
        $fac_st = $gm['fac_st'];
        $group_st = $gm['group_st'];
        $num_st = $gm['num_st'];
        $tel_st = $gm['tel_st'];
    }
}

print "<form action='save_edit_stud.php' method='get'>";
print "ФИО: <input name='fio_st' size='50' type='text'
value='$fio_st'>";
print "<br>Факультет: <input name='fac_st' size='30' type='text'
value='$fac_st'>";
print "<br>Группа: <input name='group_st' size='30' type='text'
value='$group_st'>";
print "<br>Номер зачетки: <input name='num_st' size='30' type='text'
value='$num_st'>";
print "<br>Телефон: <input name='tel_st' size='11' type='int'
value='$tel_st'>";
print "<input type='hidden' name='id_st' size='11' type='int'
value='$id_st'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href='index.php'> Вернуться к списку Студентов </a>";
?>
</body>
</html>