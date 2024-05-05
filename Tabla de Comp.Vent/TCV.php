<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleTCV.css">
    <title>Tabla</title>
</head>
<body>
    <!-- Falta agregar filtros por fecha en vez de NFactura -->
    <!-- Falta poder seleccionar que filas ver en la tabla -->
    <header>
        <h1>Tabla Clientes</h1>
    </header>

    <section>
    
        <form action="Tabla.php" method="post" class="datos">

            <br><br><br><br><br><br><br><br><br>
            
            <h2>
                Elija de que cliente quiere mostrar su tabla
            </h2>

            <label for="cliente">Cliente: </label>
            <select name="cliente" id="cliente">
                <?php include 'opcionesID.php';?>
            </select>

            <br><br><br><br>
            
            <label for="CoV">Compra o Venta: </label>
            <select name="CoV" id="CoV">
                <option value="compras">Compras</option>
                <option value="ventas">Ventas</option>
            </select>

            <h2>Filtro Inicial</h2>
            
            <label for="inicio">Inicio: </label>
            <input type="number" name="inicio" id="inicio" value=1>
            <br><br>
            <label for="final">Final: </label>
            <input type="number" name="final" id="final" value=100>

            <br><br>
            <button type="submit">Mostrar Tabla</button>
            <br><br>

            <br><br><br><br><br><br><br><br><br><br>

        </form>
    
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