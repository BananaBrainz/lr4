<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id = $_GET['id'];
$date_ved =$_GET['date_ved'];
$id_st = $_GET['id_st'];
$id_sub = $_GET['id_sub'];
$ocen = $_GET['ocen'];

$result = $mysqli->query("UPDATE ved SET date_ved='$date_ved', id_st='$id_st', id_sub='$id_sub', ocen='$ocen'  WHERE id='$id'");

if ($result) {
    echo 'Все сохранено. <a href="ved.php"> Вернуться к списку Ведомостей </a>';
} else {
    echo 'Ошибка сохранения. <a href="ved.php">Вернуться к списку Ведомостей</a> ';
}
?>
</body>
</html>