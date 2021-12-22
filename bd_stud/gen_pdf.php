<?php
require_once 'connect1.php';
require('tfpdf/tfpdf.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$pdf = new tFPDF();
$pdf->AddFont('PDFFont', '', 'cour.ttf');
$pdf->SetFont('PDFFont', '', 12);
$pdf->AddPage();

$pdf->Cell(80);
$pdf->Cell(30, 10, 'Студенты', 1, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(200, 200, 200);
$pdf->SetFontSize(6);

$header = array("п/п", "Студент", "факультет", "Группа", "Номер зачетки", "Дата сдачи", "Предмет", "Оценка", "Преподватель");
$w = array(6, 20, 25, 20, 20, 20, 40, 20, 17);
$h = 20;
for ($c = 0; $c < 9; $c++) {
    $pdf->Cell($w[$c], $h, $header[$c], 'LRTB', '0', '', true);
}
$pdf->Ln();

// Запрос на выборку сведений о пользователях
$result = $mysqli->query("SELECT
        stud.fio_st as fio_st,
        stud.fac_st as fac_st,
        stud.group_st as group_st,
        stud.num_st as num_st,
        ved.date_ved,
        subj.name_sub as name_sub,
        ved.ocen,
        subj.fio_subj as fio_subj
        FROM ved
        LEFT JOIN stud ON ved.id_st=stud.id_st
        LEFT JOIN subj ON ved.id_sub=subj.id_sub"
);

if ($result) {
    $counter = 1;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $pdf->Cell($w[0], $h, $counter, 'LRBT', '0', 'C', true);
        $pdf->Cell($w[1], $h, $row[0], 'LRB');

        for ($c = 2; $c < 9; $c++) {
            $pdf->Cell($w[$c], $h, $row[$c - 1], 'RB');
        }
        $pdf->Ln();
        $counter++;
    }
}

$pdf->Output("I", 'Stud.pdf', true);
?>