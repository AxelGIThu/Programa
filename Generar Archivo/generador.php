<?php

require 'conexion.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

$TArchivo=$_POST['TArchivo'];
$cliente=$_POST['cliente'];
$inicio=$_POST['inicio'];
$final=$_POST['final'];

$sql = "SELECT * FROM cliente WHERE ";

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Clientes");



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="clientes.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');

?>