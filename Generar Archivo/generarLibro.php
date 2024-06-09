<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
$neto = 0;
$Aimporte = 0;
$Aneto = 0;
$Aiva10y5 = 0;
$Aiva21 = 0;
$Aiva27 = 0;
$Acna = 0;
$Api = 0;
$Adgr = 0;
$Amuni = 0;
$Aotros = 0;
$Atotal = 0;

while ($row2 = $resultado2->fetch_assoc()){
    $neto = $row2['neto10y5'] + $row2['neto21'] + $row2['neto27'];
}

if ($TArchivo == "libro"){
$hojaActiva->getColumnDimension('A')->setWidth(25);
$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->getColumnDimension('B')->setWidth(25);
$hojaActiva->setCellValue('B1', 'CyV');
$hojaActiva->getColumnDimension('C')->setWidth(20);
$hojaActiva->setCellValue('C1', 'Tipo.Imputacion');
$hojaActiva->getColumnDimension('D')->setWidth(17);
$hojaActiva->setCellValue('D1', 'Importe');
$hojaActiva->getColumnDimension('E')->setWidth(17);
$hojaActiva->setCellValue('E1', 'Neto');
$hojaActiva->getColumnDimension('F')->setWidth(17);
$hojaActiva->setCellValue('F1', 'IVA 10,5%');
$hojaActiva->getColumnDimension('G')->setWidth(17);
$hojaActiva->setCellValue('G1', 'IVA 21%');
$hojaActiva->getColumnDimension('H')->setWidth(17);
$hojaActiva->setCellValue('H1', 'IVA 27%');
$hojaActiva->getColumnDimension('I')->setWidth(22);
$hojaActiva->setCellValue('I1', 'Concepto No Agrabado');
$hojaActiva->getColumnDimension('J')->setWidth(17);
$hojaActiva->setCellValue('J1', 'Percepcion IVA');
$hojaActiva->getColumnDimension('K')->setWidth(17);
$hojaActiva->setCellValue('K1', 'Percepcion DGR');
$hojaActiva->getColumnDimension('L')->setWidth(17);
$hojaActiva->setCellValue('L1', 'Percepcion Muni');
$hojaActiva->getColumnDimension('M')->setWidth(17);
$hojaActiva->setCellValue('M1', 'Otros');
$hojaActiva->getColumnDimension('N')->setWidth(17);
$hojaActiva->setCellValue('N1', 'Total');

$fila = 2;

while ($row = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $row['nombre']);
    $hojaActiva->setCellValue('B'.$fila, $row['CompVend']);
    $hojaActiva->setCellValue('C'.$fila, $row['TImputacion']);
    $hojaActiva->setCellValue('D'.$fila, $row['importe']);
    $hojaActiva->setCellValue('E'.$fila, $neto);
    $hojaActiva->setCellValue('F'.$fila, $row['IVA10y5']);
    $hojaActiva->setCellValue('G'.$fila, $row['IVA21']);
    $hojaActiva->setCellValue('H'.$fila, $row['IVA27']);
    $hojaActiva->setCellValue('I'.$fila, $row['ConcNoAgra']);
    $hojaActiva->setCellValue('J'.$fila, $row['PercIVA']);
    $hojaActiva->setCellValue('K'.$fila, $row['PercDGR']);
    $hojaActiva->setCellValue('L'.$fila, $row['PercMuni']);
    $hojaActiva->setCellValue('M'.$fila, $row['otros']);
    $hojaActiva->setCellValue('N'.$fila, $row['total']);
    $fila++;

    $Aimporte = $Aimporte + $row['importe'];
    $Aneto = $Aneto + $neto;
    $Aiva10y5 = $Aiva10y5 + $row['IVA10y5'];
    $Aiva21 = $Aiva21 + $row['IVA21'];
    $Aiva27 = $Aiva27 + $row['IVA27'];
    $Acna = $Acna + $row['ConcNoAgra'];
    $Api = $Api + $row['PercIVA'];
    $Adgr = $Adgr + $row['PercDGR'];
    $Amuni = $Amuni + $row['PercMuni'];
    $Aotros = $Aotros + $row['otros'];
    $Atotal = $Atotal + $row['total'];
}

$fila++;

    $hojaActiva->setCellValue('A'.$fila, 'Totales');

    $hojaActiva->setCellValue('C'.$fila, $Aimporte);
    $hojaActiva->setCellValue('D'.$fila, $Aneto);
    $hojaActiva->setCellValue('E'.$fila, $Aiva10y5);
    $hojaActiva->setCellValue('F'.$fila, $Aiva21);
    $hojaActiva->setCellValue('G'.$fila, $Aiva27);
    $hojaActiva->setCellValue('H'.$fila, $Acna);
    $hojaActiva->setCellValue('I'.$fila, $Api);
    $hojaActiva->setCellValue('J'.$fila, $Adgr);
    $hojaActiva->setCellValue('K'.$fila, $Amuni);
    $hojaActiva->setCellValue('L'.$fila, $Aotros);
    $hojaActiva->setCellValue('M'.$fila, $Atotal);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=' . $nombre . '.Xlsx');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
}
?>