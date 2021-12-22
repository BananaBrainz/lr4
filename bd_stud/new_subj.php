<html>
<head><title> Добавление нового Предмета </title></head>
<body>
<H2>Добавление нового Предмета:</H2>
<form action="save_new_subj.php" method="get">
    Предмет: <input name="name_sub" size="50" type="text">
    <br>ФИО преподавателя: <input name="fio_subj" size="50" type="text">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
    <a href="subj.php"> Вернуться к списку Предмета </a>
</body>
</html>
