<?php
$host = 'localhost';
$database = 'a0612073_stud';
$user = 'a0612073_root';
$password = 'root';
//require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("ошибка" . mysqli_error($link));
?>
