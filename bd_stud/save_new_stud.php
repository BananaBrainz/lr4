<?php
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysql_connect_error());
    exit();
}

mysqli_query($link, "INSERT INTO stud SET fio_st='" . $_GET['fio_st']
    . "', fac_st='" . $_GET['fac_st'] . "', group_st='"
    . $_GET['group_st'] . "', num_st='" . $_GET['num_st'] .
    "', tel_st='" . $_GET['tel_st'] . "'");
if (mysqli_affected_rows($link) > 0)
{
    print "<p>Спасибо, Студент добавлен в базу данных.";
    print "<p><a href=\"index.php\"> Вернуться к списку Студентов </a>";
} else {
    print "Ошибка сохранения. <a href=\"index.php\"> Вернуться к списку Студентов </a>";
    mysqli_close($link);
}
?>
