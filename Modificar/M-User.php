<?php
include '../funciones.php';

$coneccion = ConectarLibro();

$ar = fopen('cache.txt', "r");
while (!feof($ar)) {
    $contenido = fgets($ar);
}
fclose($ar);

if (filesize('cache.txt') != 0) {

    $arrayContenido = explode(".", $contenido);

} else {

    // Trae los datos de los clientes
    $tabla = mysqli_query($coneccion, "SELECT nombre, CUIT, IVA, IDCliente FROM clientes");

    // Los guarda en el archivo "cache.txt"
    while ($datos = mysqli_fetch_array($tabla)) {

        if ($datos[3] == $_REQUEST['ID']) {
            $nombre = $datos[0];
            $CUIT = $datos[1];
            $IVA = $datos[2];
        }

    }

    $ar = fopen('cache.txt', "a");
    fputs($ar, $nombre . "." . $CUIT . "." . $IVA);
    fclose($ar);

    $ar = fopen('cache.txt', "r");
    while (!feof($ar)) {
        $contenido = fgets($ar);
    }
    fclose($ar);

    // Separa los contenidos del archivo para poder ser mostrados en la pagina
    $arrayContenido = explode(".", $contenido);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleM.css">
    <title>Modificar Usuario</title>
</head>
<body>

    <header>
        <h1><?php echo $arrayContenido[0]; ?></h1>
    </header>
    
    <section>
    <br><br><br><br><br><br><br><br><br><br><br>
    <center>
        <table border="1">
            <tr>
                <td>Nombre</td>
                <td>CUIT</td>
                <td>IVA</td>
            </tr>

            <tr>
                <?php
                
                for ($i=0; $i < 3; $i++) { 
                    echo "<td>" . $arrayContenido[$i] . "</td>";
                }
                
                ?>
            </tr>
        </table>
        <h2>Modificar</h2>
        <table border="1">
            <tr>
                <td>Nombre</td>
                <td>CUIT</td>
                <td>IVA</td>
            </tr>

            <tr>

                <form action="M-User.php" method="post">
                <td>
                    <input type="text" name="NuevoNombre" required>
                    <input type="hidden" name="ViejoNombre" value="<?php echo $arrayContenido[0]; ?>">
                    <br>
                    <button type="submit" onclick= <?php ModificarCliente($_REQUEST); ?> >Modificar</button>
                </td>
                </form>

                <form action="M-User.php" method="post" required>
                <td>
                    <input type="number" name="NuevoCUIT">
                    <input type="hidden" name="ViejoCUIT" value=<?php echo $arrayContenido[1]; ?>>
                    <br>
                    <button type="submit" onclick= <?php ModificarCliente($_REQUEST); ?> >Modificar</button>
                </td>
                </form>

                <form action="M-User.php" method="post" required>
                <td>
                    <input type="text" name="NuevoIVA">
                    <input type="hidden" name="ViejoIVA" value=<?php echo $arrayContenido[2]; ?>>
                    <br>
                    <button type="submit" onclick= <?php ModificarCliente($_REQUEST); ?> >Modificar</button>
                </td>
                </form>

            </tr>
        </table>
    </center>
        </form>
            <br>
            <form action="" class="datos">
            <button><a href="M.php" onclick=<?php BorrarCache(); ?>>Volver</a></button>
        </form>

    <br><br><br><br><br><br><br><br><br><br><br><br><br>
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