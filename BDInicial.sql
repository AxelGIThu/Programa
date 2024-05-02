<?php
$verificacion = 0;

$coneccion = mysqli_connect('localhost', 'root', '', '');

$bds = mysqli_query($coneccion, "SHOW DATABASES");

while ($bd = mysqli_fetch_array($bds)) {
    if ($bd[0] === 'libro'){
        $verificacion++;
    }
    }

if($verificacion == 0){
$mac="localhost";
$usuar="root";
$pass="";
$bas="";
$coneccion = mysqli_connect($mac, $usuar, $pass, $bas);

mysqli_query($coneccion, 'CREATE DATABASE libro');

mysqli_close($coneccion);

$coneccion = mysqli_connect($mac, $usuar, $pass, "libro");

mysqli_query($coneccion, "CREATE TABLE `clientes`(
	IDCliente int PRIMARY KEY,
    nombre varchar(80),
    CUIT varchar(11),
    IVA varchar(20)
) ENGINE='innoDB';");

mysqli_close($coneccion);
}
?>