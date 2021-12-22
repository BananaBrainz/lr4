<html>
<head>
<title>  Редактирование данных о Предмете </title>
</head>
<body>
<?php
require_once 'connect1.php';
$mysqli= new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу"; 
}// установление соединения с сервером
$id_sub = $_GET['id_sub'];

$result = $mysqli->query("SELECT name_sub, fio_subj FROM subj WHERE id_sub='$id_sub'");
if ($result){
 while ($gm = $result->fetch_array()) {
 $name_sub = $gm['name_sub'];
 $fio_subj = $gm['fio_subj'];
 }}
 
print "<form action='save_edit_subj.php' method='get'>";
print "Предмет: <input name='name_sub' size='50' type='text'
value='$name_sub'>";
print "<br>ФИО преродавателя: <input name='fio_subj' size='50' type='text'
value='$fio_subj'>";
print "<input type='hidden' name='id_sub' size='11' type='int'
value='$id_sub'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href='subj.php'> Вернуться к списку Предметов </a>";
?>
</body>
</html>