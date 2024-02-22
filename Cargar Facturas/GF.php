<?php

$mac="localhost"; // servidor
$usuar="root"; // permisos
$pass=""; // contraseña
$bas=""; // nombre de la bd
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleGF.css">
    <title>Gen.Facturas</title>
</head>
<body>

    <header>
        <h1>Cargar Facturas</h1>
    </header>
    
    <section>

        <article>

            <br>
            <form action="GF.php" method="post" class="datos">

            <label for="ID">ID: </label>
            <select name="ID" id="ID">
                <?php include 'opcionesID.php'; ?>
            </select>
            <br>
            <br>

            <label for="comprobante">Comprobante: </label>
            <input type="date" name="comprobante" id="comprobante">
            <br>
            <br>
            
            <label for="procesamiento">Procesamiento: </label>
            <input type="date" name="procesamiento" id="procesamiento">
            <br>
            <br>
            
            <label for="movimiento">Movimiento: </label>
            <select name="movimiento" id="movimiento">
                <?php include 'opcionesMov.php';?>
            </select>
            <br>
            <br>
            
            <label for="TImputacion">Tipo de Imputacion: </label>
            <select name="TImputacion" id="TImputacion">
                <?php include 'opcionesTImp.php';?>
            </select>
            <label for="TImputacion2"> Otro: </label>
            <input type="text" name="TImputacion2" id="TImputacion2">
            <br>
            <br>

            <label for="TComprobante">Tipo de Comprobante: </label>
            <select name="TComprobante" id="TComprobante">
                <?php include 'opcionesTCom.php'; ?>
            </select>
            <br>
            <br>
            
            <label for="NComprobante">Numero de Comprobante: </label>
            <input type="number" name="NComprobante" id="NComprobante" placeholder="0000000000000">
            <br>
            <br>

            <label for="neto10y5">Neto 10,5%: </label>
            <input type="number" name="neto10y5" id="neto10y5">
            <br>
            <br>

            <label for="neto21">Neto 21%: </label>
            <input type="number" name="neto21" id="neto21">
            <br>
            <br>
            
            <label for="neto27">Neto 27%: </label>
            <input type="number" name="neto27" id="neto27">
            <br>
            <br>
            
            <label for="ConcNoAgra">Concepto No Agrabado: </label>
            <input type="number" name="ConcNoAgra" id="ConcNoAgra">
            <br>
            <br>

            <label for="PercIVA">Percepcion IVA: </label>
            <input type="number" name="PercIVA" id="PercIVA">
            <br>
            <br>

            <label for="PercDGR">Percerpcion DGR: </label>
            <input type="number" name="PercDGR" id="PercDGR">
            <br>
            <br>
            
            <label for="PercMuni">Percepcion Municipalidad: </label>
            <input type="number" name="PercMuni" id="PercMuni">
            <br>
            <br>

            <input type="submit" value="Generar">

            </form>
            <br>
        </article>
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
$coneccion=mysqli_connect($mac, $usuar, $pass, 'libro');

/* connect_errno llama/trae el ultimo codigo de error
puede ser usado para referenciar a un error en caso de que ocurra como acá abajo
*/
if ($coneccion->connect_errno) {
    echo "Fallo la conexion " . $coneccion->connect_error;
}

if ($_POST) {

    include 'definirVariables.php';

    $tabla2 = mysqli_query($coneccion, "SELECT CUIT, nombre, IVA FROM clientes WHERE IDCliente = $ID");

    while ($row = mysqli_fetch_array($tabla2)) {
        $CUIT = $row[0];
        $nombre = $row[1];
        $IVA = $row[2];
    }
    // Los clientes se identifican por CUIL pero yo lo hago por IDCliente
    // Completar los IF's con papá

    $mysqli = new mysqli('localhost','root','','libro');

    $ID_str= $mysqli->real_escape_string($_POST['ID']);
    $nombreTabla= "t" . $ID_str;

    $neto10y5= $neto10y5 - ($neto10y5 * 0.105);
    $IVA10y5 = $neto10y5 * 0.105;

    $neto21  = $neto21 - ($neto21 * 0.21);
    $IVA21   = $neto21   * 0.21;

    $neto27  = $neto27 - ($neto27 * 0.27);
    $IVA27   = $neto27   * 0.27;

    if ($TImputacion2 != null) {
        $TImputacion = $TImputacion2;
    }
    
    $total=(($neto10y5+$IVA10y5)+($neto21+$IVA21)+($neto27+$IVA27)+$PercDGR+$PercIVA+$PercMuni);

    mysqli_query($coneccion, "INSERT INTO `$nombreTabla` (`NFactura`, `comprobante`, `procesamiento`, `TComprobante`, `movimiento`, `Timputacion`, `CUIT`, `nombre`, `neto21`, `IVA21`, `neto10y5`, `IVA10y5`, `neto27`, `IVA27`, `ConcNoAgra`, `PercIVA`, `PercDGR`, `PercMuni`, `total`) 
                                                  VALUES ('', '$comprobante', '$procesamiento', '$TComprobante', '$movimiento', '$TImputacion', '$CUIT', '$nombre', '$neto21', '$IVA21', '$neto10y5', '$IVA10y5', '$neto27', '$IVA27', '$ConcNoAgra', '$PercIVA', '$PercDGR', '$PercMuni', '$total')");

}

?>