
<?php

/*

Falta arreglar la consulta de SQL de la linea 23
Falta arreglar el CSS del error-Ini-Fin.html de ambas carpetas (generar archivo y tabla comp.vent)
Falta poder poner los datos en la tablar, por lo tanto hacer un for tambien para eso

*/

$mysqli = new mysqli('localhost','root','','libro');

// $coneccion = mysqli_connect("Localhost", "root", "", "");

$ID_str= $mysqli->real_escape_string($_POST['cliente']);
$inicio=$_POST['inicio'];
$final=$_POST['final'];
$CoV = $_POST['CoV'];
$nombreTabla= $CoV . $ID_str;

if ($inicio == NULL or $final == NULL or $inicio < 0 or $final < 0) {
    include 'error-Ini-Fin.html';
} else {
$sql = "SELECT * FROM $nombreTabla NFactura BETWEEN $inicio AND $final";
$resultado = $mysqli->query($sql);

/*
while ($row = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $row['NFactura']);
    $hojaActiva->setCellValue('B'.$fila, $row['comprobante']);
    $hojaActiva->setCellValue('C'.$fila, $row['procesamiento']);
    $hojaActiva->setCellValue('D'.$fila, $row['TComprobante']);
    $hojaActiva->setCellValue('E'.$fila, $row['NComprobante']);
    $hojaActiva->setCellValue('F'.$fila, $row['movimiento']);
    $hojaActiva->setCellValue('G'.$fila, $row['TImputacion']);
    $hojaActiva->setCellValue('H'.$fila, $row['CUIT']);
    $hojaActiva->setCellValue('I'.$fila, $row['nombre']);
    $hojaActiva->setCellValue('J'.$fila, $row['neto21']);
    $hojaActiva->setCellValue('K'.$fila, $row['IVA21']);
    $hojaActiva->setCellValue('L'.$fila, $row['neto10y5']);
    $hojaActiva->setCellValue('M'.$fila, $row['IVA10y5']);
    $hojaActiva->setCellValue('N'.$fila, $row['neto27']);
    $hojaActiva->setCellValue('O'.$fila, $row['IVA27']);
    $hojaActiva->setCellValue('P'.$fila, $row['ConcNoAgra']);
    $hojaActiva->setCellValue('Q'.$fila, $row['PercIVA']);
    $hojaActiva->setCellValue('R'.$fila, $row['PercDGR']);
    $hojaActiva->setCellValue('S'.$fila, $row['PercMuni']);
    $hojaActiva->setCellValue('T'.$fila, $row['total']);
    $fila++;
}
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleTCV.css">
    <title>Tabla</title>
</head>
<body>

    <header>
        <h1>Tabla de Compras</h1>
    </header>
    
    <section>
        <table>
            <tr>

            </tr>
        <?php
        

        
        ?>
        </table>
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

}

?>