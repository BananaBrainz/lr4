<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$link->query('SET NAMES UTF-8');
/* проверка соединения */

$sql_add = "INSERT INTO user SET user_name='" . $_GET['name']
    ."', user_login='".$_GET['login']."', user_password='"
    .$_GET['password']."', user_e_mail='".$_GET['e_mail'].
    "', user_info='".$_GET['info']. "'";

$link->query($sql_add);

if (mysqli_affected_rows($link)>0) {
    print "<p>Спасибо, вы зарегистрированы в базе данных.";
 print "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>"; 
}

mysqli_close($link);
?>