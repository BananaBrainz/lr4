<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
require_once 'connect.php'; // подключаем скрипт

if (isset($_POST['id'])) {

    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
    $id = mysqli_real_escape_string($link, $_POST['id']);

    $query = "DELETE FROM user WHERE id_user = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    mysqli_close($link);
    echo 'Все сохранено. <a href="index.php"> Вернуться к списку пользователей </a>';

}

if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
    echo "<h2>Удалить ?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Удалить'>
        </form>";
}
?>
</body>
</html>