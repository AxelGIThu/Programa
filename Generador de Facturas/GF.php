<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styleGF.css">
    <title>Gen.Facturas</title>
</head>
<body>

    <header>
        <h1>Generar Facturas</h1>
    </header>
    
    <section>

        <article>

            <br>
            <form action="GF.php" method="post" class="datos">
            <label for="empresa">Empresa: </label>
            <input type="number" name="empresa" id="empresa">
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
            
            <label for="IVA">IVA: </label>
            <input type="text" name="IVA" id="IVA">
            <br>
            <br>

            <label for="movimiento">Movimiento: </label>
            <input type="text" name="movimiento" id="movimiento">
            <br>
            <br>
            
            <label for="TLiquidacion">Tipo de Liquidacion: </label>
            <input type="text" name="TLiquidacion" id="TLiquidacion">
            <br>
            <br>
            
            <label for="TComprobante">Tipo de Liquidacion: </label>
            <input type="text" name="TComprobante" id="TComprobante">
            <br>
            <br>
            
            <label for="NComprobante">Numero de Comprobante: </label>
            <input type="number" name="NComprobante" id="NComprobante">
            <br>
            <br>
            
            <label for="CUIT">CUIT: </label>
            <input type="number" name="CUIT" id="CUIT">
            <br>
            <br>
            
            <label for="total">Total: </label>
            <input type="number" name="total" id="total">
            <br>
            <br>

            <input type="submit" value="Generar">

            </form>
            
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

$mac="localhost"; // servidor
$usuar="root"; // permisos
$pass=""; // contraseña
$bas=""; // nombre de la bd
$coneccion=mysqli_connect($mac, $usuar, $pass, $bas);

$empresa="";
$comprobante="";
$procesamiento="";
$IVA="";
$movimiento="";
$TLiquidacion="";
$TComprobante="";
$NComprobante="";
$CUIT="";
$total="";

if ($_POST) {
    $empresa=$_POST['empresa'];
    $comprobante=$_POST['comprobante'];
    $procesamiento=$_POST['procesamiento'];
    $IVA=$_POST['IVA'];
    $movimiento=$_POST['movimiento'];
    $TLiquidacion=$_POST['TLiquidacion'];
    $TComprobante=$_POST['TComprobante'];
    $NComprobante=$_POST['NComprobante'];
    $CUIT=$_POST['CUIT'];
    $total=$_POST['total'];

    // mysqli_query($coneccion, "INSERT INTO ")
    // Preguntarle a papa con que variable se identifica al cliente

}

?>