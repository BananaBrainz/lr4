<html>
<head>
    <title> Редактирование данных Зачетной ведомости </title>
</head>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером

$id = $_GET['id'];
$prod = mysqli_query($mysqli, "SELECT
			ved.id,
			ved.date_ved,
            ved.ocen,
       
			stud.id_st as id_st,
			stud.fio_st as fio_st,

			subj.id_sub as id_sub,
			subj.name_sub as name_sub

			FROM ved
			LEFT JOIN stud ON ved.id_st=stud.id_st
			LEFT JOIN subj ON ved.id_sub=subj.id_sub
			WHERE ved.id='$id'"
);

if ($prod) {
    $prod = $prod->fetch_array();

    $id = $prod['id'];
    $date_ved = $prod['date_ved'];
    $ocen = $prod['ocen'];

    $id_st = $prod['id_st'];
    $fio_st = $prod['fio_st'];

    $id_sub = $prod['id_sub'];
    $name_sub = $prod['name_sub'];

}


print "<form action='save_edit_ved.php' method='get'>";

//работа с играми
$result = $mysqli->query("SELECT id_st, fio_st FROM stud WHERE id_st <> '$id_st' ");
echo "<br>ФИО:<select name='id_st'>";
echo "<option selected value='$id_st'>$fio_st</option>";
if ($result) {
    while ($row = $result->fetch_array()) {
        $id_st = $row['id_st'];
        $fio_st = $row['fio_st'];
        echo "<option value='$id_st'>$fio_st</option>";
    }
}
echo "</select>";

//работа с магазинами
$result = $mysqli->query("SELECT id_sub, name_sub FROM subj WHERE id_sub <> '$id_sub' ");
echo "<br>Названия: <select name='id_sub'>";
echo "<option selected value='$id_sub'>$name_sub</option>";

if ($result) {
    while ($row = $result->fetch_array()) {
        $id_sub = $row['id_sub'];
        $name_sub = $row['name_sub'];
        echo "<option value='$id_sub'>$name_sub</option>";
    }
}
echo "</select>";

print "<br>Дата: <input name='date_ved' placeholder='dd-mm-yyyy' type='date' value=$date_ved>";
print "<br> Оценка: <input name='ocen' size='11' type='int' value=$ocen>";
print "<input type='hidden' name='id' size='11' value=$id>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
print "<p><a href='ved.php'> Вернуться к Зачетной ведомости </a>";
?>
</body>
</html>