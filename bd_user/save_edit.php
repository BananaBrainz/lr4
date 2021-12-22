<html>
<body>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database);

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
mysqli_query($link, "UPDATE user SET user_name='" . $_GET['name'] . "', user_login='" . $_GET['login'] . "', user_password='" . $_GET['password'] . "', user_e_mail='" . $_GET['e_mail'] . "', user_info='" . $_GET['info'] . "' WHERE id_user=" . $_GET['id']);

if (mysqli_affected_rows($link) > 0) {
    print "<p>Все сохранено.";
    print "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>";
} else {
    print "<p>Ошибка сохранения.";
    print "<p><a href=\"index.php\">Вернуться к списку пользователей</a> ";
}


mysqli_close($link);
?>
</body>
</html>