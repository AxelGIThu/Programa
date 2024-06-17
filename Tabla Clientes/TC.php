<?php
include '../funciones.php';

$coneccion = ConectarLibro();

$clientes = mysqli_query($coneccion, "SELECT * FROM clientes");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleTC.css">
    <title>Clientes</title>
</head>
<body>

    <header>
        <h1>Clientes</h1>
    </header>

    <section>
    <br><br>
        <table border="1" class="datos" style="margin: auto;">
            <tr>
                <td>IDCliente</td>
                <td>Nombre</td>
                <td>CUIT</td>
                <td>IVA</td>
            </tr>

            <?php
            
            while ($cliente = mysqli_fetch_assoc($clientes)) {
                echo "
                <tr>
                <td>".$cliente['IDCliente']."</td>
                <td>".$cliente['nombre']."</td>
                <td>".$cliente['CUIT']."</td>
                <td>".$cliente['IVA']."</td>
                </tr>
                ";
            }
            
            ?>

        </table>
            <br><br>
        </form>
            <br>
            <form action="" class="datos">
            <button><a href="../Index.php">Volver</a></button>
        </form>

    <br><br>
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