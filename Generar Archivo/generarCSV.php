<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($TArchivo == "CSV"){
$hojaActiva->getColumnDimension('A')->setWidth(11);
$hojaActiva->setCellValue('A1', 'Nro.Factura');
$hojaActiva->getColumnDimension('B')->setWidth(20);
$hojaActiva->setCellValue('B1', 'Fecha.Comprobante');
$hojaActiva->getColumnDimension('C')->setWidth(20);
$hojaActiva->setCellValue('C1', 'Fecha.Procesamiento');
$hojaActiva->getColumnDimension('D')->setWidth(18);
$hojaActiva->setCellValue('D1', 'Tipo.Comprobante');
$hojaActiva->getColumnDimension('E')->setWidth(18);
$hojaActiva->setCellValue('E1', 'Nro.Comprobante');
$hojaActiva->getColumnDimension('F')->setWidth(12);
$hojaActiva->setCellValue('F1', 'Movimiento');
$hojaActiva->getColumnDimension('G')->setWidth(16);
$hojaActiva->setCellValue('G1', 'Tipo.Imputacion');
$hojaActiva->getColumnDimension('H')->setWidth(12);
$hojaActiva->setCellValue('H1', 'CUIT');
$hojaActiva->getColumnDimension('I')->setWidth(30);
$hojaActiva->setCellValue('I1', 'Nombre');
$hojaActiva->getColumnDimension('J')->setWidth(9);
$hojaActiva->setCellValue('J1', 'Neto 21%');
$hojaActiva->getColumnDimension('K')->setWidth(9);
$hojaActiva->setCellValue('K1', 'IVA 21%');
$hojaActiva->getColumnDimension('L')->setWidth(11);
$hojaActiva->setCellValue('L1', 'Neto 10,5%');
$hojaActiva->getColumnDimension('M')->setWidth(9);
$hojaActiva->setCellValue('M1', 'IVA 10,5%');
$hojaActiva->getColumnDimension('N')->setWidth(9);
$hojaActiva->setCellValue('N1', 'Neto 27%');
$hojaActiva->getColumnDimension('O')->setWidth(9);
$hojaActiva->setCellValue('O1', 'IVA 27%');
$hojaActiva->getColumnDimension('P')->setWidth(23);
$hojaActiva->setCellValue('P1', 'Concepto No Agrabado');
$hojaActiva->getColumnDimension('Q')->setWidth(14);
$hojaActiva->setCellValue('Q1', 'Percepcion IVA');
$hojaActiva->getColumnDimension('R')->setWidth(15);
$hojaActiva->setCellValue('R1', 'Percepcion DGR');
$hojaActiva->getColumnDimension('S')->setWidth(16);
$hojaActiva->setCellValue('S1', 'Percepcion Muni');
$hojaActiva->getColumnDimension('T')->setWidth(9);
$hojaActiva->setCellValue('T1', 'Total');

$fila = 2;

while ($row = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $row['NFactura']);
    $hojaActiva->setCellValue('B'.$fila, $row['comprobante']);
    $hojaActiva->setCellValue('C'.$fila, $row['procesamiento']);
    $hojaActiva->setCellValue('D'.$fila, $row['TComprobante']);
    $hojaActiva->setCellValue('E'.$fila, $row['NComprobante']);
    $hojaActiva->setCellValue('F'.$fila, $row['movimiento']);
    $hojaActiva->setCellValue('G'.$fila, $row['TImputacion']);
    $hojaActiva->setCellValue('H'.$fila, $row['CUIT']);
    $hojaActiva->setCellValue('I'.$fila, $row['nombre']);
    $hojaActiva->setCellValue('J'.$fila, $row['neto21']);
    $hojaActiva->setCellValue('K'.$fila, $row['IVA21']);
    $hojaActiva->setCellValue('L'.$fila, $row['neto10y5']);
    $hojaActiva->setCellValue('M'.$fila, $row['IVA10y5']);
    $hojaActiva->setCellValue('N'.$fila, $row['neto27']);
    $hojaActiva->setCellValue('O'.$fila, $row['IVA27']);
    $hojaActiva->setCellValue('P'.$fila, $row['ConcNoAgra']);
    $hojaActiva->setCellValue('Q'.$fila, $row['PercIVA']);
    $hojaActiva->setCellValue('R'.$fila, $row['PercDGR']);
    $hojaActiva->setCellValue('S'.$fila, $row['PercMuni']);
    $hojaActiva->setCellValue('T'.$fila, $row['total']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=' . $nombre . '.Csv');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Csv');
$writer->save('php://output');
}
?>