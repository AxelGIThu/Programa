<?php
$mac="localhost"; // servidor
$usuar="root"; // permisos
$pass=""; // contraseña
$bas="libro"; // nombre de la bd
$coneccion=mysqli_connect($mac, $usuar, $pass, $bas);

$count=(-1);


mysqli_close($coneccion);

print($count);

?>