<?php

include '../funciones.php';
$cont = 0;
$cont2 = 0;
$cont3 = 0;
$coneccion = ConectarLibro();
session_start();

if ($_SESSION['ID'] == 0) {
    $_SESSION['ID'] = $_REQUEST['ID'];
}

if (isset($_REQUEST['CoV'])) {
    $_SESSION['nombreTabla'] = $_REQUEST['CoV'] . $_REQUEST['IDCliente'];
    $_SESSION['NFidentificador'] = $_REQUEST['NFidentificador'];
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

$NFactura = $_SESSION['NFidentificador'];
$nombreTabla = $_SESSION['nombreTabla'];

$resultado = mysqli_query($coneccion, "SELECT * FROM $nombreTabla WHERE NFactura = $NFactura");

mysqli_close($coneccion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleM.css">
    <title>Registro</title>
</head>
<body>

    <header>
        <h1>Modificar</h1>
    </header>

    <section>

<center>
    <?php
    // Creando el array para los datos filtrados de la tabla
    $arrayFor = ["NFactura", "comprobante", "procesamiento", "TComprobante", "NComprobante", "movimiento", "TImputacion", "CUIT", "nombre", "importe", "neto21", "IVA21", "neto10y5", "IVA10y5", "neto27", "IVA27", "ConcNoAgra", "PercIVA", "PercDGR", "PercMuni", "otros", "total"];
    $arrayWhile = [];
    $i2 = 0;
    
    foreach ($arrayFor as $i) {
        if (isset($_POST[$i])) {
            $arrayWhile[] = $arrayFor[$i2];
        }
        $i2++;
    }

    if (count($arrayWhile) > 10) {

        ?>
        <br><br>
        <fieldset style="width: fit-content;">
            <legend>ERROR</legend>
            No es posible modificar mas de 9 registros a la vez. <br>
            Porfavor intente nuevamente.
        </fieldset>
        <br><br>
        <?php

    } else {

    echo '<table border="1" style="margin: 0 auto;">';

    // Creando el encabezado filtrado de la tabla
    echo "<tr>";
        foreach ($arrayWhile as $nombreDato) { 
            echo "<th><h5>". $nombreDato . "</h5></th>";
        }
    echo "</tr>";
        
    // Poblando la tabla
    while ($dato = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        foreach ($arrayWhile as $nombreDato) { 
            echo "<th><h5>". $dato[$nombreDato] . "</h5></th>";
        }
        echo "</tr>";

        echo "<tr>";

        foreach ($arrayWhile as $nombreDato) {
            
            if(gettype($dato[$nombreDato]) == "integer" or gettype($dato[$nombreDato]) == "double") {
            echo "
                <td>
                    <form action='M-Procesamiento.php' method='POST'>
                        <input type='hidden' name='campo' value='". $nombreDato ."'>
                        <input type='number' name='ValorNuevo'>
                        <input type='hidden' name='ValorViejo' value='". $dato[$nombreDato] ."'>
                        <br>
                        <button type='submit'>Modificar</button>
                    </form>
                </td>";
            }
            if(gettype($dato[$nombreDato]) == "string") {
                echo "
                <td>
                    <form action='M-Procesamiento.php' method='POST'>
                        <input type='hidden' name='ID' value='". $_SESSION['ID'] ."'>
                        <input type='hidden' name='campo' value='". $nombreDato ."'>
                        <input type='text' name='ValorNuevo'>
                        <input type='hidden' name='ValorViejo' value='". $dato[$nombreDato] ."'>
                        <br>
                        <button type='submit'>Modificar</button>
                    </form>
                </td>";
            }
        }
        echo "</tr>";
    }

    echo "</table>";
}

    ?>
    
    </form>
            <br>
            <form action="" class="datos">
            <button><a href="M.php">Volver</a></button>
    </form>

    </section>
    <br><br>
</center>

    <footer>
        <p>Copyright 2024</p>
        <section>
        <a target="_blank" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=libro">Base de datos</a>
        <br>
        </section>
    </footer>

</body>
</html>