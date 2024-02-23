<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Gen.Archivos</title>
    <link rel="stylesheet" href="styleGA.css">
</head>
<body>
    
    <header>
        <h1>Generador de Archivos</h1>
    </header>

    <section>

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
            <br><br>

            <label for="inicio">Iniciar: </label>
            <input type="number" name="inicio" id="inicio" placeholder="0">
            <label for="final">Terminar: </label>
            <input type="number" name="final" id="final" placeholder="10">
            <br><br>

            <div>
                <span class="subTitulo">Ejemplo</span>
                <br>
                <span class="texto">Iniciar: 0,  Terminar: 10
                <br>
                Se generara un archivo con los registros del 0 al 10 (11 registros)
                </span>
            </div>

            <br><br>

            <button type="submit">Generar</button>
            <br><br>

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