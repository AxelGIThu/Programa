<?php

require_once 'vendor/autoload.php';
require_once 'BDInicial.sql';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa</title>
    <link rel="stylesheet" href="style/styleIND.css">
</head>
<body>

    <header>
        <div>
            <h1>Programa</h1>
            <h2>IVA</h2>
        </div>
    </header>
    <br><br><br>
    <section class="container" id="links">
        
        <article class="center">
            <button><a href="Cargar Facturas/GF.php">Cargar Factura</a></button>
        </article>

        <br><br><br>
        <article class="center">
            <button><a href="Nuevo Cliente/NC.php">Nuevo Cliente</a></button>
        </article>

        <br><br><br>
        <article class="center">
            <button><a href="Generar Archivo/GA.php">Generar Archivos</a></button>
        </article>

        <br><br><br>
        <article class="center">
            <button><a href="Tabla Clientes/TC.php">Tabla Clientes</a></button>
        </article>

        <br><br><br>
        <article class="center">
            <button><a href="Tabla de Comp.Vent/TCV.php">Tabla Registros</a></button>
        </article>

        <br><br><br>
        <article class="center">
            <button><a href="Modificar/M.php">Modificar</a></button>
        </article>
        
    </section>
    <br><br><br><br>
    <footer>
        <p>Copyright 2024</p>
        <section>
        <a target="_blank" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=libro">Base de datos</a>
        <br>
        </section>
    </footer>

</body>
</html>