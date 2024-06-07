<?php

include '../funciones.php';

$coneccion = ConectarLibro();

if (isset($_REQUEST['NuevoNombre'])) {
    mysqli_query($coneccion, "UPDATE clientes SET nombre = '" . $_REQUEST['NuevoNombre'] . "' WHERE nombre = '" . $_REQUEST['ViejoNombre'] . "';");
    var_dump($_REQUEST);
}

if (isset($_REQUEST['NuevoCUIT'])) {
    mysqli_query($coneccion, "UPDATE clientes SET CUIT = " . $_REQUEST['NuevoCUIT'] . " WHERE CUIT = " . $_REQUEST['ViejoCUIT'] . ";");
}

if (isset($_REQUEST['NuevoIVA'])) {
    mysqli_query($coneccion, "UPDATE clientes SET IVA = " . $_REQUEST['NuevoIVA'] . " WHERE IVA = " . $_REQUEST['ViejoIVA'] . ";");
}

mysqli_close($coneccion);

?>