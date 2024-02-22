<?php

require '../../../vendor/autoload.php';
require 'conexion.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory}; // Otra forma de "usar" mas de una libreria
// use PhpOffice\PhpSpreadsheet\IOFactory;

$IVA = $mysqli->real_escape_string($_POST['IVA']);
$nombre = $mysqli->real_escape_string($_POST['nombre']);

$sql = "SELECT IDCliente, nombre, CUIT, IVA FROM clientes WHERE nombre LIKE '$nombre' AND IVA LIKE '$IVA'";
$resultado = $mysqli->query($sql);
// $resultado = mysqli_query($coneccion, $sql);            <- Hecho de la forma que yo escribo sql

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Clientes");

$hojaActiva->getColumnDimension('A')->setWidth(5);
$hojaActiva->setCellValue('A1', 'ID');
$hojaActiva->getColumnDimension('B')->setWidth(25);
$hojaActiva->setCellValue('B1', 'nombre');
$hojaActiva->getColumnDimension('C')->setWidth(13);
$hojaActiva->setCellValue('C1', 'CUIT');
$hojaActiva->getColumnDimension('D')->setWidth(12);
$hojaActiva->setCellValue('D1', 'IVA');

$fila = 2;

while ($row = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $row['IDCliente']);
    $hojaActiva->setCellValue('B'.$fila, $row['nombre']);
    $hojaActiva->setCellValue('C'.$fila, $row['CUIT']);
    $hojaActiva->setCellValue('D'.$fila, $row['IVA']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="clientes.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');

?>