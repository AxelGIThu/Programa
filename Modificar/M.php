<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleM.css">
    <title>Modificar</title>
</head>
<body>
    
<datalist id="lista">
    <?php  include '../funciones.php'; ListaClientes(); ?>
</datalist>

    <header>
        <h1>Modificar</h1>
    </header>
    
    <section>
    <br><br><br><br><br><br><br><br><br><br><br>
    
        <form action="M-User.php" method="post" class="datos">

        <div>
            <b><i>En este apartado se le permitira modificar los datos y registros de los clientes registrados.</i></b>
            <br>
            <b>Aquí abajo debera ingresar alguna de las opciones que se le presentan.</b>
            <br>
            <b>Si no encuentra el cliente que desea, debera cargarlo en el apartado de Nuevo Cliente.</b>
        </div>
        <br><br>

        <label for="ID">Cliente: </label>
        <input type="text" list='lista' name="ID" id="ID" required>
        <br>
        <br>

        <button type="submit">Buscar</button>

        </form>
        
        </form>
            <br>
            <form action="" class="datos">
            <button><a href="../Index.php">Volver</a></button>
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

<?php

?>