<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id_st = $_GET['id_st'];

$fio_st = $_GET['fio_st'];
$fac_st = $_GET['fac_st'];
$group_st = $_GET['group_st'];
$num_st = $_GET['num_st'];
$tel_st = $_GET['tel_st'];

$zapros = "UPDATE stud SET fio_st='$fio_st', fac_st='$fac_st',
group_st='$group_st', num_st='$num_st', tel_st='$tel_st'
WHERE id_st='$id_st'";

$result = $mysqli->query($zapros);

if ($result) {
    echo 'Все сохранено. <a href="index.php"> Вернуться к списку Студентов </a>';
} else {
    echo 'Ошибка сохранения. <a href="index.php">Вернуться к списку Студентов</a> ';
}
?>
</body>
</html>