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
    }

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
        <h1><?php echo $_SESSION['nombre']; ?></h1>
    </header>
    
    <section>
    <br><br><br><br><br><br><br><br><br><br><br>
    <center>
        <h2>Datos del Cliente</h2>
        <table border="1">
            <tr>
                <td>Nombre</td>
                <td>CUIT</td>
                <td>IVA</td>
            </tr>

            <tr>
                <?php
                
                for ($i=0; $i < 3; $i++) { 
                    echo "<td>" . $_SESSION[$columnas[$i]] . "</td>";
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

                <form action="M-Usuario.php" method="post">
                <td>
                    <input type="text" name="NuevoNombre" required>
                    <input type="hidden" name="ViejoNombre" value="<?php echo $_SESSION['nombre']; ?>">
                    <br>
                    <button type="submit" onclick= <?php ModificarCliente($_REQUEST); ?> >Modificar</button>
                </td>
                </form>

                <form action="M-Usuario.php" method="post" required>
                <td>
                    <input type="number" name="NuevoCUIT">
                    <input type="hidden" name="ViejoCUIT" value=<?php echo $_SESSION['CUIT']; ?>>
                    <br>
                    <button type="submit" onclick= <?php ModificarCliente($_REQUEST); ?> >Modificar</button>
                </td>
                </form>

                <form action="M-Usuario.php" method="post" required>
                <td>
                    <select name="NuevoIVA">
                        <option value="inscripto">Inscripto</option>
                        <option value="monotributista">Monotributista</option>
                    </select>
                    <input type="hidden" name="ViejoIVA" value=<?php echo $_SESSION['IVA']; ?>>
                    <br>
                    <button type="submit" onclick= <?php ModificarCliente($_REQUEST); ?> >Modificar</button>
                </td>
                </form>

            </tr>
        </table>

        <p><b>Importante<br>Si modifica alguno de los datos, para poder verlos en esta misma pagina debera actualizarla (F5)</b></p>

    </center>
        </form>
            <br>
            <form action="" class="datos">
            <button><a href="M.php">Volver</a></button>
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