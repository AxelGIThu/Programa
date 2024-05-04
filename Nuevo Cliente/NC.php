<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleNC.css">
    <title>Nuevo Cliente</title>
</head>
<body>
    
    <header>
        <h1>Nuevo Cliente</h1>
    </header>
    
    <section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
        <form action="NC.php" method="post" class="datos">
        <br>
        <p></p>
        <label for="CUIT">CUIT: </label>
        <input type="number" name="CUIT" id="CUIT">       
        <br><br>

        <label for="nombre">Nombre (Completo): </label>
        <input type="text" name="nombre" id="nombre"> 
        <br><br>       

        <label for="IVA">IVA: </label>
        <select name="IVA" id="IVA">
            <option value="inscripto">Inscripto</option>
            <option value="monotributista">Monotributista</option>
        </select>  
        <br><br>

        <input type="submit" value="Cargar">
        <br><br>

        </form>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>
    
    <footer>
        <p>Copyright 2024</p>
        <section>
        <a href="../Index.php">Volver</a>
        <br>
        <a target="_blank" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=libro">Base de datos</a>
        <br>
        </section>
    </footer>

</body>
</html>

<?php

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

$nombre="";
$IVA="";
$count=0;

if($_POST) {
    $CUIT = $_POST['CUIT'];
    $nombre=$_POST['nombre'];
    $IVA =  $_POST['IVA'];

    $showt=mysqli_query($coneccion, "SHOW TABLES");
    while($db=mysqli_fetch_array($showt)) {
        $count = $count+1;
	}

    $count2 = $count;
    $mov = "mov$count";

    mysqli_query($coneccion, "CREATE TABLE `compras$count` (NFactura int AUTO_INCREMENT PRIMARY KEY ,comprobante date, procesamiento date, TComprobante varchar(50), NComprobante text(13), movimiento varchar(50), TImputacion varchar(50), 
    CUIT varchar(11), nombre text(100), neto21 decimal(10,2), IVA21 decimal(10,2), neto10y5 decimal(10,2), IVA10y5 decimal(10,2), 
    neto27 decimal(10,2), IVA27 decimal(10,2), ConcNoAgra decimal(10,2), PercIVA decimal(10,2), PercDGR decimal(10,2), 
    PercMuni decimal(10,2), total decimal(10,2)) ENGINE='innoDB'");

    mysqli_query($coneccion, "CREATE TABLE `ventas$count` (NFactura int AUTO_INCREMENT PRIMARY KEY ,comprobante date, procesamiento date, TComprobante varchar(50), NComprobante text(13), movimiento varchar(50), TImputacion varchar(50), 
    CUIT varchar(11), nombre text(100), neto21 decimal(10,2), IVA21 decimal(10,2), neto10y5 decimal(10,2), IVA10y5 decimal(10,2), 
    neto27 decimal(10,2), IVA27 decimal(10,2), ConcNoAgra decimal(10,2), PercIVA decimal(10,2), PercDGR decimal(10,2), 
    PercMuni decimal(10,2), total decimal(10,2)) ENGINE='innoDB'");

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

?>