
<?php

/*

Falta arreglar el CSS del error-Ini-Fin.html de ambas carpetas (generar archivo y tabla comp.vent)

*/

$mysqli = new mysqli('localhost','root','','libro');

// $coneccion = mysqli_connect("Localhost", "root", "", "");

$ID_str= $mysqli->real_escape_string($_POST['cliente']);
$inicio=$_POST['inicio'];
$final=$_POST['final'];
$CoV = $_POST['CoV'];
$nombreTabla= $CoV . $ID_str;

$ValFin = str_replace("-","",$final);
$ValIni = str_replace("-","",$inicio);

// if ($inicio == NULL or $final == NULL or $inicio < 0 or $final < 0) {
//     include 'error-Ini-Fin.html';
// } else {
// $sql = "SELECT * FROM $nombreTabla WHERE NFactura BETWEEN $inicio AND $final";
$sql = "SELECT * FROM $nombreTabla WHERE comprobante BETWEEN $ValIni AND $ValFin";
$resultado = $mysqli->query($sql);

// $tablaDatos = mysqli_query($coneccion, "SELECT * FROM $nombreTabla WHERE NFactura BETWEEN $inicio AND $final");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleTCV.css">
    <title>Tabla</title>
</head>
<body>

    <header>
        <h1>Tabla de Compras</h1>
    </header>
    
    <section>
        <br><br><br>
        <center>
        <br><br><br>
        <table border="1" style="margin: 0 auto;">
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

        // Creando el encabezado filtrado de la tabla
        echo "<tr>";
            foreach ($arrayWhile as $nombreDato) { 
                echo "<th><h5>". $nombreDato . "</h5></th>";
            }
        echo "</tr>";
        
        // Poblando la tabla
        while ($dato = $resultado->fetch_assoc()){
            echo "<tr>";
            foreach ($arrayWhile as $nombreDato) { 
                echo "<th><h5>". $dato[$nombreDato] . "</h5></th>";
            }
            echo "</tr>";
        }
        
        ?>
        </table>
        
        </form>
            <br>
            <form action="" class="datos">
            <button><a href="../Index.php">Volver</a></button>
        </form>

        <br><br><br>
        </center>
    </section>

    <footer>
        <p>Copyright 2024</p>
        <section>
        <a href="TCV.php">Volver</a>
        <br>
        <a target="_blank" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=libro">Base de datos</a>
        <br>
        </section>
    </footer>

</body>
</html>

<?php

// }

?>