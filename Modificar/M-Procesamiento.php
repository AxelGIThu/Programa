<?php

include '../funciones.php';
session_start();

ModificarRegistro($_SESSION['nombreTabla'], $_REQUEST['campo'], $_REQUEST['ValorViejo'], $_REQUEST['ValorNuevo']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleM.css">
    <title>Modificar</title>
</head>
<body>

    <header>
        <h1>Modificar</h1>
    </header>

    <section>
    <br><br><center>
        <fieldset style="width: fit-content;" class="datos">
            <legend>Operación Existosa</legend>
            Su modificación ha sido realizada con exito.
        </fieldset>
    <br><br></center>
        <!-- </form>
            <br>
            <form action="" class="datos"> -->
                <center>
            <button><a href="M.php">Volver</a></button>
            </center>
        <!-- </form> -->
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