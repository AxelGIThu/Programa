<?php

function NuevoCliente ($CUIT, $nombre, $IVA) {
// Permite añadir clientes a la base de datos "clientes".

$mac="localhost"; // servidor
$usuar="root"; // permisos
$pass=""; // contraseña
$bas="libro"; // nombre de la bd
$coneccion=mysqli_connect($mac, $usuar, $pass, $bas);

/* connect_errno llama/trae el ultimo codigo de error
puede ser usado para referenciar a un error en caso de que ocurra como acá abajo
*/
if ($coneccion->connect_errno) {
    echo "Fallo la conexion " . $coneccion->connect_error;
}

$count=0;

    // Id se genera de manera peculiar
    // primer cliente = 1, segundo = 3

    $count = ContarClientes();

    $count2 = $count;

    mysqli_query($coneccion, "CREATE TABLE `compras$count` (NFactura int AUTO_INCREMENT PRIMARY KEY ,comprobante date, procesamiento date, TComprobante varchar(50), NComprobante varchar(15), movimiento varchar(50), TImputacion varchar(50), 
    CUIT varchar(11), nombre text(100), CompVend text(100), importe decimal(10,2), neto21 decimal(10,2), IVA21 decimal(10,2), neto10y5 decimal(10,2), IVA10y5 decimal(10,2), 
    neto27 decimal(10,2), IVA27 decimal(10,2), ConcNoAgra decimal(10,2), PercIVA decimal(10,2), PercDGR decimal(10,2), 
    PercMuni decimal(10,2), otros decimal(10,2), total decimal(10,2)) ENGINE='innoDB'");

    mysqli_query($coneccion, "CREATE TABLE `ventas$count` (NFactura int AUTO_INCREMENT PRIMARY KEY ,comprobante date, procesamiento date, TComprobante varchar(50), NComprobante varchar(13), movimiento varchar(50), TImputacion varchar(50), 
    CUIT varchar(11), nombre text(100), CompVend text(100), importe decimal(10,2), neto21 decimal(10,2), IVA21 decimal(10,2), neto10y5 decimal(10,2), IVA10y5 decimal(10,2), 
    neto27 decimal(10,2), IVA27 decimal(10,2), ConcNoAgra decimal(10,2), PercIVA decimal(10,2), PercDGR decimal(10,2), 
    PercMuni decimal(10,2), otros decimal(10,2), total decimal(10,2)) ENGINE='innoDB'");

    /* Orden: Fecha de factura; fecha de procesamiento; tipo de comprobante; tipo de imputación; 
    CUIT; Apellido y Nombre o Razón social; Neto 21; iva 21; Neto 10.5; iva 10.5; 
    Neto 27; iva 27; Conceptos No Gravados; Percepción de IVA; Percepción DGR, 
    Percepción Municipalidad y Total
    */

    /* Tipo de imputación: Fuente de gasto o ganancia; verduleria, gasolineria, flete, etc */

    mysqli_query($coneccion, "INSERT INTO `clientes` (`IDCliente`, `nombre`, `CUIT`, `IVA`) VALUES ('$count2', '$nombre', '$CUIT', '$IVA');");

    //mysqli_query($coneccion, "");

    mysqli_close($coneccion);

}

function ContarClientes() {
    // Permite contar la cantidad de clientes de la base de datos "clientes".
    // Es usado para la creación de nuevos clientes para la IDCliente.
    
    $CantClientes = 1;
    $coneccion = mysqli_connect('localhost', 'root', '', 'libro');
    $tabla = mysqli_query($coneccion, "SELECT * FROM clientes");
    while ($datos = mysqli_fetch_array($tabla)) {
            $CantClientes++;
        }
    mysqli_close($coneccion);
    return $CantClientes;
}

?>