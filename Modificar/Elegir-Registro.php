<?php
include '../funciones.php';

$columnas = array("nombre", "CUIT", "IVA");
$coneccion = ConectarLibro();
session_start();

if ($_SESSION['ID'] == 0) {
    $_SESSION['ID'] = $_REQUEST['ID'];
}

$tabla = mysqli_query($coneccion, "SELECT nombre, CUIT, IVA, IDCliente FROM clientes");

while ($datos = mysqli_fetch_array($tabla)) {

    if ($datos[3] == $_SESSION['ID']) {
        $_SESSION['nombre'] = $datos[0];
        $_SESSION['CUIT'] = $datos[1];
        $_SESSION['IVA'] = $datos[2];
        $_SESSION['IDCliente']  = $datos[3];
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleM.css">
    <title>Modificar Registro</title>
</head>
<body>

    <header>
        <h1><?php echo "Registros de: " . $_SESSION['nombre']; ?></h1>
    </header>
    
    <section>
    <br><br><br>
    <center>
        <?php
        
        if (isset($_REQUEST['CoV'])) {

        ?>
        <form action="M-Registro.php" method="POST">
        <fieldset style="width: fit-content;">
            <legend><b>¿Que registro desea modificar?</b></legend>
            <br>
            <label for="NFidentificador"><b>Ingrese el numero de la factura que desee modificar</b></label><br>
            <input type="number" name="NFidentificador">
            <input type="hidden" value=<?php echo $_SESSION['IDCliente'];?> name="IDCliente">
            <input type="hidden" value=<?php echo $_REQUEST['CoV'];?> name="CoV">
            <br><br>

            <p><b>Chekee los campos que desea modificar</b></p>

            <label for="NFactura">NumFac</label>
            <input type="checkbox" name="NFactura" id="NFactura">
            <label for="comprobante">Comp</label>
            <input type="checkbox" name="comprobante" id="comprobante">
            <label for="procesamiento">Proc</label>
            <input type="checkbox" name="procesamiento" id="procesamiento">
            <label for="TComprobante">TipComp</label>
            <input type="checkbox" name="TComprobante" id="TComprobante">
            <label for="NComprobante">NumComp</label>
            <input type="checkbox" name="NComprobante" id="NComprobante">
            <label for="movimiento">Mov</label>
            <input type="checkbox" name="movimiento" id="movimiento">
            <label for="TImputacion">TipoImp</label>
            <input type="checkbox" name="TImputacion" id="TImputacion">
            <label for="CUIT">CUIT</label>
            <input type="checkbox" name="CUIT" id="CUIT">
            <label for="nombre">Nombre</label>
            <input type="checkbox" name="nombre" id="nombre">
            <label for="importe">Importe</label>
            <input type="checkbox" name="importe" id="importe">
            <br>
            <label for="neto21">Neto 21%</label>
            <input type="checkbox" name="neto21" id="neto21">
            <label for="IVA21">IVA 21%</label>
            <input type="checkbox" name="IVA21" id="IVA21">
            <label for="neto10y5">Neto 10,5%</label>
            <input type="checkbox" name="neto10y5" id="neto10y5">
            <label for="IVA10y5">IVA 10,5%</label>
            <input type="checkbox" name="IVA10y5" id="IVA10y5">
            <label for="neto27">Neto 27%</label>
            <input type="checkbox" name="neto27" id="neto27">
            <label for="IVA27">IVA 27%</label>
            <input type="checkbox" name="IVA27" id="IVA27">
            <label for="ConcNoAgra">ConcNoAgra</label>
            <input type="checkbox" name="ConcNoAgra" id="ConcNoAgra">
            <br>
            <label for="PercIVA">PercIVA</label>
            <input type="checkbox" name="PercIVA" id="PercIVA">
            <label for="PercDGR">PercDGR</label>
            <input type="checkbox" name="PercDGR" id="PercDGR">
            <label for="PercMuni">PercMuni</label>
            <input type="checkbox" name="PercMuni" id="PercMuni">
            <label for="otros">otros</label>
            <input type="checkbox" name="otros" id="otros">
            <label for="total">Total</label>
            <input type="checkbox" name="total" id="total">
            <br><br>

            <button type="submit">Modificar</button>

        </fieldset>
        </form>
        <br><br>

        <p><b>Importante<br>Si modifica alguno de los datos, para poder verlos en esta misma pagina debera actualizarla (F5)</b></p>
        <br>

        <?php

            $inicio=$_POST['inicio'];
            $final=$_POST['final'];
            $CoV = $_POST['CoV'];
            $nombreTabla= $CoV . $_SESSION['IDCliente'];

            $ValFin = str_replace("-","",$final);
            $ValIni = str_replace("-","",$inicio);

            $resultado = mysqli_query($coneccion, "SELECT * FROM $nombreTabla WHERE comprobante BETWEEN $ValIni AND $ValFin");
            mysqli_close($coneccion);

        echo "<table border='1' style='margin: 0 auto;'>";
        
        // Creando el array para los datos filtrados de la tabla
        $arrayForeach = ["NFactura", "comprobante", "procesamiento", "TComprobante", "NComprobante", "movimiento", "TImputacion", "CUIT", "nombre", "CompVend", "importe", "neto21", "IVA21", "neto10y5", "IVA10y5", "neto27", "IVA27", "ConcNoAgra", "PercIVA", "PercDGR", "PercMuni", "otros", "total"];
        

        // Creando el encabezado filtrado de la tabla
        echo "<tr>";
            foreach ($arrayForeach as $nombreDato) { 
                echo "<th><h5>". $nombreDato . "</h5></th>";
            }
        echo "</tr>";
        
        // Poblando la tabla
        while ($dato = mysqli_fetch_row($resultado)){
            echo "<tr>";
            for ($i=0; $i < count($dato); $i++) { 
                echo "<th><h5>". $dato[$i] . "</h5></th>";
            }

            echo "</tr>";
        }
        echo "</table>";

    } else {
        // Mostrar el formulario    
    
        ?>
        

        <fieldset style="width: fit-content;">
            <br>
            <legend>¿Que registros quiere poder modificar?</legend>
            <form action="Elegir-Registro.php" method="post">

            <input type='hidden' name='ID' value=<?php echo "'" . $_SESSION['ID'] . "'"?>>

            <label for="CoV">Compra o Venta: </label>
            <select name="CoV" id="CoV" required>
                <option value="compras">Compras</option>
                <option value="ventas">Ventas</option>
            </select>

            <h2>Filtro Fecha</h2>
            
            <label for="inicio">Desde: </label>
            <input type="date" name="inicio" id="inicio" value=1 required>
            <br><br>
            <label for="final">Hasta: </label>
            <input type="date" name="final" id="final" value=100 required><br><br>

            <button type="submit">Traer</button>
            </form>
        </fieldset>        

        <?php }?>

    </center>
        </form>
            <br>
            <form action="" class="datos">
            <button><a href="M.php">Volver</a></button>
        </form>

    <br><br><br>
    </section>

    <footer>
        <p>Copyright 2024</p>
        <section>
        <a target="_blank" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=libro">Base de datos</a>
        <br>
        </section>
    </footer>

</body>
</html>