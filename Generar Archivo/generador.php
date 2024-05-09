<?php

require '../vendor/autoload.php';
require 'conexion.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
use PhpOffice\PhpSpreadsheet\Writer\Csv;

$TArchivo=$_POST['TArchivo'];
$inicio=$_POST['inicio'];
$final=$_POST['final'];
$CoV = $_POST['CoV'];
$nombre = $_POST['nombre'];
if ($nombre == NULL) {
    $nombre = "ArchivoSinNombre";
}

if ($inicio == NULL or $final == NULL or $inicio < 0 or $final < 0) {
    include 'error-Ini-Fin.html';
} else {

    $ID_str= $mysqli->real_escape_string($_POST['cliente']);
    $nombreTabla= $CoV . $ID_str;
    
    $sql = "SELECT * FROM $nombreTabla WHERE NFactura BETWEEN $inicio AND $final";
    $resultado = $mysqli->query($sql);
    $resultado2 = $mysqli->query($sql);
    
    $excel = new Spreadsheet();
    $hojaActiva = $excel->getActiveSheet();
    $hojaActiva->setTitle("Clientes");
    
    include 'generarCSV.php';
    include 'generarLibro.php';
    
}
?>