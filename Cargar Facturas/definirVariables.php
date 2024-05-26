<?php
// Definir variables vacias para evitar problemas
$CUIT   = "";
$ID     = "";
$CUIT   = "";
$nombre = "";
$IVA    = "";
$tablaT = "";
$total = 0;

$array = array('ID','comprobante','procesamiento','movimiento','TImputacion','TComprobante','NComprobante', 'importe','neto21','neto10y5','neto27','ConcNoAgra','PercIVA','PercDGR','PercMuni','otros');

foreach ($array as $i) {
    if ($_POST[$i] == null) {
        $_POST[$i] = 0;
    }

}

// Traer valores del formulario
$ID           = $_POST['ID'];
$ID2           = $_POST['ID2'];
$comprobante  = $_POST['comprobante'];
$procesamiento= $_POST['procesamiento'];
$movimiento   = $_POST['movimiento'];
$TImputacion  = $_POST['TImputacion'];
$TComprobante = $_POST['TComprobante'];
$NComprobante = $_POST['NComprobante'];
$neto21       = $_POST['neto21'];
$neto10y5     = $_POST['neto10y5'];
$neto27       = $_POST['neto27'];
$ConcNoAgra   = $_POST['ConcNoAgra'];
$PercIVA      = $_POST['PercIVA'];
$PercDGR      = $_POST['PercDGR'];
$PercMuni     = $_POST['PercMuni'];
$otros        = $_POST['otros'];
$importe      = $_POST['importe'];

?>