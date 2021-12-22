<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером


$id_sub = $_GET['id_sub'];
$name_sub = $_GET['name_sub'];
$fio_subj = $_GET['fio_subj'];

$zapros = "UPDATE subj SET name_sub='$name_sub', fio_subj='$fio_subj' 
WHERE id_sub='$id_sub'";

$result = $mysqli->query($zapros);

if ($result) {
    echo 'Все сохранено. <a href="subj.php"> Вернуться к списку Предметов </a>';
} else {
    echo 'Ошибка сохранения. <a href="subj.php">Вернуться к списку Предметов</a> ';
}
?>
</body>
</html>