<?php

$mac="localhost"; // servidor
$usuar="root"; // permisos
$pass=""; // contraseña
$bas=""; // nombre de la bd

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styleGF.css">
    <title>Gen.Facturas</title>
</head>
<body>

    <header>
        <h1>Cargar Facturas</h1>
    </header>
    
    <section>

        <article>

            <br><br><br><br><br>
            <form action="GF.php" method="post" class="datos">

            <label for="ID">ID: </label>
            <select name="ID" id="ID">
            <?php
        
            $coneccion = mysqli_connect('localhost', 'root', '', 'libro');
            $tabla = mysqli_query($coneccion, "SELECT * FROM clientes");

            while ($datos = mysqli_fetch_array($tabla)) {
                ?>
                    <option value="<?php $datos['IDCliente']?>"><?php  echo $datos['IDCliente'] . " - " . $datos['nombre'] ?></option>
                <?php
            }

            mysqli_close($coneccion);

            ?>
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
            
            <label for="TImputacion">TImputacion: </label>
            <select name="TImputacion" id="TImputacion">
                <?php include 'opcionesTImp.php';?>
            </select>
            <br>
            <br>

            <label for="TLiquidacion">Tipo de Liquidacion: </label>
            <select name="TLiquidacion" id="TLiquidacion">
                <?php include 'opcionesTLiq.php';?>
            </select>
            <br>
            <br>

            <label for="TComprobante">Tipo de Comprobante: </label>
            <select name="TComprobante" id="TComprobante">
                <?php include 'opcionesTCom.php'; ?>
            </select>
            <br>
            <br>
            
            <label for="NComprobante">Numero de Comprobante: </label>
            <input type="number" name="NComprobante" id="NComprobante">
            <br>
            <br>
            
            <label for="total">Total: </label>
            <input type="number" name="total" id="total">
            <br>
            <br>

            <input type="submit" value="Generar">

            </form>
            <br><br><br>
        </article>
    </section>

    <footer>
        <p>Copyright 2024</p>
        <section>
        <a href="../Index.html">Volver</a>
        <br>
        <a href="mailto:javieraxel375@gmail.com">Contactame</a>
        </section>
    </footer>

</body>
</html>

<?php
$coneccion=mysqli_connect($mac, $usuar, $pass, 'libro');

$ID="";
$comprobante="";
$procesamiento="";
// $IVA="";
$TImputacion="";
$TLiquidacion="";
$TComprobante="";
$NComprobante="";
// $CUIT="";
$total="";

if ($_POST) {

include 'definirVariables.php';
$tabla=mysqli_query($coneccion, "SELECT * FROM clientes");
    $ID=$_POST['ID'];
    while ($datos=mysqli_fetch_array($tabla)) {
        
        if ($datos['IDCliente'] == $ID) {
            
        // $tablaT = $datos['IDCliente'];
        $CUIT = $datos['CUIT'];
        $nombre = $datos['nombre'];
        $IVA = $datos['IVA'];
    }
}

    // mysqli_query($coneccion, "INSERT INTO ")
    // Los clientes se identifican por CUIL pero yo lo hago por IDCliente
    // Completar los select e IF's con papá
print($tablaT."a");
    //mysqli_query($coneccion, "INSERT INTO $tablaT('NFactura', 'comprobante', 'procesamiento', 'TComprobante', 'movimiento', 'Timputacion', 'CUIT', 'nombre', 'neto21', 'IVA21', 'neto10y5', 'IVA10y5', 'neto27', 'IVA27', 'ConcNoAgra', 'PercDGR', 'PercMuni', 'total') VALUES ('', $comprobante, $procesamiento, $TComprobante, $movimiento, $TLiquidacion, $TImputacion, $CUIT, $nombre, $neto21, $IVA21, $neto10y5, $IVA10y5, $neto27, $IVA27, $ConcNoAgra, $PercIVA, $PercDGR, $PercMuni, $total)");

}

?>