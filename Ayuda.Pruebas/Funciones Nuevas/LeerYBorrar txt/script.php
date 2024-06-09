<?php

$nombre = "Axel";
$CUIT = 2304985;
$IVA = "inscripto";
start:
$ar = fopen('cache.txt', "r");

while (!feof($ar)) {
    $contenido = fgets($ar);
}

fclose($ar);

if ($contenido != "") {

    $arrayContenido = explode(".", $contenido);
    echo "Cliente: " . $arrayContenido[0] . "<br>CUIT: " . $arrayContenido[1] . "<br>IVA: " . $arrayContenido[2];

} else {

    $ar = fopen('cache.txt', "a");
    fputs($ar, $nombre . "." . $CUIT . "." . $IVA);
    fclose($ar);

    echo "Cache cargado<br>";
    goto start;
}



?>