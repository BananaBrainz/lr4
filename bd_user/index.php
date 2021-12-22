<?
require_once 'connect.php'; ?>
<html>
<head> <title> Сведения о прользователях сайта </title> </head>
<body>
<table border="1">

    <h2>Зарегистрированные пользователи:</h2>
    <table border="1">
        <tr>
            <th> Имя </th> <th> E-mail </th>
            <th> Редактировать </th> <th> Уничтожить </th> </tr>

        <?php
        $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

        $result = mysqli_query($link, "SELECT id_user, user_name, user_e_mail FROM user");// запрос на выборку сведений о пользователях
        mysqli_select_db($link, "users");

        while ($row= mysqli_fetch_array($result)){// для каждой строки из запроса
            echo "<tr>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['user_e_mail'] . "</td>";
            echo "<td><a href='edit.php?id=" . $row['id_user'] . "'> Редактировать </a> </td>"; // запуск скрипта для редактирования
            echo "<td><a href='delete.php?id=" . $row['id_user'] . "'> Удалить </a></td>"; // запуск скрипта для удаления записи
            echo "</tr>";
        }
        print "</table>";
        $num_rows = mysqli_num_rows($result); // число записей в таблице БД
        print("<P> Всего пользователей: $num_rows </p>");
        ?>
        <p> <a href="new.php"> Добавить пользователя </a>
</body>
</html>