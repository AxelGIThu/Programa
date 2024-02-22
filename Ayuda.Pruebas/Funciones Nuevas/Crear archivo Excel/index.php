<?php

require '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\Writer\csv;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator("Axel Moscardi")->setTitle("Mi Excel");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();

$spreadsheet->getDefaultStyle()->getFont()->setName('Tahoma');
$spreadsheet->getDefaultStyle()->getFont()->setSize(15);

$hojaActiva->getColumnDimension('A')->setWidth('40');
$hojaActiva->getColumnDimension('B')->setWidth('20');

$hojaActiva->setCellValue('A1', 'Codigos de programacion');
$hojaActiva->setCellValue('A2', 12345.6789);

$hojaActiva->setCellValue('C1', 'Axel Moscardi')->setCellValue('D1', 'CDP');

/* Crear un archivo de excel Xlsx */

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Mi Excel.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// $writer = new Xlsx($spreadsheet);
// $writer->save('Mi Excel.xlsx');

/* Crear un archivo de excel Xls */

// header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename="Mi Excel.xls"');
// header('Cache-Control: max-age=0');

// $writer = IOFactory::createWriter($spreadsheet, 'Xls');
// $writer->save('php://output');


// $writer = new Xls($spreadsheet);
// $writer->save('Mi Excel.xls');


?>