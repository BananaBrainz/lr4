<html>
<head><title> Добавление нового Студента </title></head>
<body>
<H2>Добавление нового Студента:</H2>
<form action="save_new_stud.php" method="get">
    ФИО: <input name="fio_st" size="50" type="text">
    <br>Факультет: <input name="fac_st" size="50" type="text">
    <br>Группа: <input name="group_st" size="50" type="text">
    <br>Номер зачетки: <input name="num_st" size="15" type="text">
    <br>Телефон: <input name="tel_st" size="15" type="text">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
    <a href="index.php"> Вернуться к списку Автомобилей </a>
</body>
</html>
