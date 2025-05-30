<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gen.Archivos</title>
    <link rel="stylesheet" href="../style/styleGA.css">
</head>
<body>
    
    <header>
        <h1>Generador de Archivos</h1>
    </header>

    <section>
        <br><br><br><br><br>
        <form action="generador.php" method="post" class="datos">

            <h2>¿Que tipo de archivo desea crear?</h2>
            <br>

            <select name="TArchivo" id="TArchivo">
                <option value="CSV">CSV</option>
                <option value="libro">Libro</option>
            </select>
            <br><br>
            
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
            <br><br><br><br>

            <label for="nombre">Nombre del archivo: </label>
            <input type="text" name="nombre" id="nombre" placeholder="ArchivoSinNombre">
            <br><br><br><br>

            <label for="inicio">Iniciar: </label>
            <input type="number" name="inicio" id="inicio" value="1">
            <label for="final">Terminar: </label>
            <input type="number" name="final" id="final" value="100">
            <br><br><br>

            <div>
                <span class="subTitulo">Ejemplo</span>
                <br>
                <span class="texto">Iniciar: 0,  Terminar: 10
                <br>
                Se generara un archivo con los registros del 0 al 10 (11 registros)
                </span>
            </div>

            <br><br><br><br><br>

            <button type="submit">Generar</button>

        </form>

        </form>
            <br>
            <form action="" class="datos">
            <button><a href="../Index.php">Volver</a></button>
        </form>

        <br><br><br><br><br>
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