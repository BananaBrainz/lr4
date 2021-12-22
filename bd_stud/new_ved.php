<html>
<head><title> Добавление Ведомости </title></head>
<body>
<H2>Добавление Ведомости:</H2>
<form action="save_new_ved.php" method="get">
    <?php
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }

    $result = $mysqli->query("SELECT id_st, fio_st FROM stud");
    echo "<br>Студент: <select name='id_st'>";



    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_st = $row['id_st'];
            $fio_st = $row['fio_st'];
            echo "<option value='$id_st'>$fio_st</option>";
        }
    }
    echo "</select>";

    $result = $mysqli->query("SELECT id_sub, name_sub FROM subj");
    echo "<br>Предмет: <select name='id_sub'>";

    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_sub = $row['id_sub'];
            $name_sub = $row['name_sub'];
            echo "<option value='$id_sub'>$name_sub</option>";
        }
    }
    echo "</select>";

    print "<br> Дата: <input name='date_ved' placeholder='dd-mm-yyyy' type='date' value=$date_ved>";
    print "<br> Оценка: <input name='ocen' size='11' type='int' value=$ocen>";
    ?>


    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
    <p><a href="ved.php"> Вернуться к списку Автомобилей </a>
</form>
</body>
</html>
