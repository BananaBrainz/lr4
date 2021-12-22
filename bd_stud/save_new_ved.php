<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$date_ved = $_GET['date_ved'];
$id_st = $_GET['id_st'];
$id_sub = $_GET['id_sub'];
$ocen = $_GET['ocen'];

// Выполнение запроса
$result = $mysqli->query("INSERT INTO ved SET date_ved='$date_ved', id_st='$id_st', id_sub='$id_sub', ocen='$ocen'");

if ($result) {
    print "<p>Внесение данных прошло успешно!";
    print "<p><a href='ved.php'> Вернуться к списку </a>";
} else {
    print "Ошибка сохранения <a href='ved.php'> Вернуться к списку </a>";
}

?>