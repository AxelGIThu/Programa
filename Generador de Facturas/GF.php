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

            <br>
            <form action="GF.php" method="post" class="datos">
            <label for="ID">ID: </label>
            <input type="number" name="ID" id="ID">
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
            
            <!-- <label for="IVA">IVA: </label>
            <input type="text" name="IVA" id="IVA">
            <br>
            <br> -->

            <label for="TImputacion">TImputacion: </label>
            <input type="text" name="TImputacion" id="TImputacion">
            <br>
            <br>
            
            <label for="TLiquidacion">Tipo de Liquidacion: </label>
            <input type="text" name="TLiquidacion" id="TLiquidacion">
            <br>
            <br>
            
            <label for="TComprobante">Tipo de Comprobante: </label>
            <input type="text" name="TComprobante" id="TComprobante">
            <br>
            <br>
            
            <label for="NComprobante">Numero de Comprobante: </label>
            <input type="number" name="NComprobante" id="NComprobante">
            <br>
            <br>
            
            <!-- <label for="CUIT">CUIT: </label>
            <input type="number" name="CUIT" id="CUIT">
            <br>
            <br> -->
            
            <label for="total">Total: </label>
            <input type="number" name="total" id="total">
            <br>
            <br>

            <input type="submit" value="Generar">

            </form>

            <h2>Indice Clientes</h2>

            <table border="1">
                <th>ID</th>
                <th>Nombre</th>

                <?php
                
                $coneccion=mysqli_connect($mac, $usuar, $pass, 'libro');
                
                $tabla=mysqli_query($coneccion, "SELECT * FROM clientes");

                ?>
                <tbody>
                <?php
                
                while ($datos=mysqli_fetch_array($tabla)) {
                    ?>
                    <tr>
                        <td><?php echo $datos['IDCliente'];?></td>
                        <td><?php echo $datos['nombre'];?></td>
                    </tr>
                <?php
                }
                

                mysqli_close($coneccion);

                ?>
                </tbody>

            </table>
            
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
$coneccion=mysqli_connect($mac, $usuar, $pass, $bas);

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
    $ID=$_POST['ID'];
    $comprobante=$_POST['comprobante'];
    $procesamiento=$_POST['procesamiento'];
    // $IVA=$_POST['IVA'];
    $TImputacion=$_POST['TImputacion'];
    $TLiquidacion=$_POST['TLiquidacion'];
    $TComprobante=$_POST['TComprobante'];
    $NComprobante=$_POST['NComprobante'];
    // $CUIT=$_POST['CUIT'];
    $total=$_POST['total'];

    // mysqli_query($coneccion, "INSERT INTO ")
    // Los clientes se identifican por CUIL pero yo lo hago por IDCliente
    // Completar los select e IF's con papá

    mysqli_query($coneccion, "INSERT INTO $tabla('NFactura', 'comprobante', 'procesamiento', 'TComprobante', 'Timputacion', 'CUIT', 'nombre', 'neto21', 'IVA21', 'neto10y5', 'IVA10y5', 'neto27', 'IVA27', 'ConcNoAgra', 'PercDGR', 'PercMuni', 'total') VALUES ('', $comprobante, $procesamiento, $TComprobante, $TLiquidacion, $TImputacion, $CUIT, $nombre, $neto21, $IVA21, $neto10y5, $IVA10y5, $neto27, $IVA27, $ConcNoAgra, $PercIVA, $PercDGR, $PercMuni, $total)");

}

?>