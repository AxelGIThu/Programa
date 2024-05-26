<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleNC.css">
    <title>Nuevo Cliente</title>
</head>
<body>
    
    <header>
        <h1>Nuevo Cliente</h1>
    </header>
    
    <section>
    <br><br><br><br><br><br><br><br><br><br><br>
    
        <form action="NC.php" method="post" class="datos">
        <br>
        <p></p>
        <label for="CUIT">CUIT: </label>
        <input type="number" name="CUIT" id="CUIT">       
        <br><br>

        <label for="nombre">Nombre (Completo): </label>
        <input type="text" name="nombre" id="nombre"> 
        <br><br>       

        <label for="IVA">IVA: </label>
        <select name="IVA" id="IVA">
            <option value="inscripto">Inscripto</option>
            <option value="monotributista">Monotributista</option>
        </select>  
        <br><br>

        <input type="submit" value="Cargar">

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
include '../funciones.php';
if ($_POST) {
    NuevoCliente($_POST['CUIT'], $_POST['nombre'], $_POST['IVA']);
}
?>