<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query = "SELECT user_name, user_login, user_password, user_e_mail, user_info FROM user WHERE id_user=" . $_GET['id'];
$rows = mysqli_query($link, $query);

if ($rows) {
    if (mysqli_num_rows($rows) > 0) {
        while ($st = mysqli_fetch_array($rows)) {
            $id = $_GET['id'];
            $name = $st['user_name'];
            $login = $st['user_login'];
            $password = $st['user_password'];
            $e_mail = $st['user_e_mail'];
            $info = $st['user_info'];
        }
    }
}
echo "<form action='save_edit.php' metod='get'>";
echo " Имя: <td> <input name='name' size='50' type='text' value='" . $name . "'> <br>";
echo "Логин: <input name='login' size='20' type='text'value='" . $login . "'><br>";
echo "Пароль: <input name='password' size='20' type='text'value='" . $password . "'><br>";
echo "Е-mail: <input name='e_mail' size='30' type='text'value='" . $e_mail . "'><br>";
echo "Информация: <textarea name='info' rows='4' cols='40'>" . $info . "</textarea><br>";
echo "<input type='hidden' name='id' value='" . $id . "'> <br>";
echo "<input type='submit' name='' value='Сохранить'>";
echo "</form>";
echo "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>";
mysqli_free_result($result);

?>

</html>
