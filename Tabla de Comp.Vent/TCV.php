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

            <br><br><br><br>
            
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

            <h2>Filtro Fecha</h2>
            
            <label for="inicio">Desde: </label>
            <input type="date" name="inicio" id="inicio" value=1>
            <br><br>
            <label for="final">Hasta: </label>
            <input type="date" name="final" id="final" value=100>

            <h2>Filtro Columnas</h2>

            <label for="NFactura">NumFac</label>
            <input type="checkbox" name="NFactura" id="NFactura" checked>
            <label for="comprobante">Comp</label>
            <input type="checkbox" name="comprobante" id="comprobante" checked>
            <label for="procesamiento">Proc</label>
            <input type="checkbox" name="procesamiento" id="procesamiento" checked>
            <label for="TComprobante">TipComp</label>
            <input type="checkbox" name="TComprobante" id="TComprobante" checked>
            <label for="NComprobante">NumComp</label>
            <input type="checkbox" name="NComprobante" id="NComprobante" checked>
            <label for="movimiento">Mov</label>
            <input type="checkbox" name="movimiento" id="movimiento" checked>
            <label for="TImputacion">TipoImp</label>
            <input type="checkbox" name="TImputacion" id="TImputacion" checked>
            <label for="CUIT">CUIT</label>
            <input type="checkbox" name="CUIT" id="CUIT" checked>
            <label for="nombre">Nombre</label>
            <input type="checkbox" name="nombre" id="nombre" checked>
            <label for="importe">Importe</label>
            <input type="checkbox" name="importe" id="importe" checked>
            <br>
            <label for="neto21">Neto 21%</label>
            <input type="checkbox" name="neto21" id="neto21" checked>
            <label for="IVA21">IVA 21%</label>
            <input type="checkbox" name="IVA21" id="IVA21" checked>
            <label for="neto10y5">Neto 10,5%</label>
            <input type="checkbox" name="neto10y5" id="neto10y5" checked>
            <label for="IVA10y5">IVA 10,5%</label>
            <input type="checkbox" name="IVA10y5" id="IVA10y5" checked>
            <label for="neto27">Neto 27%</label>
            <input type="checkbox" name="neto27" id="neto27" checked>
            <label for="IVA27">IVA 27%</label>
            <input type="checkbox" name="IVA27" id="IVA27" checked>
            <label for="ConcNoAgra">ConcNoAgra</label>
            <input type="checkbox" name="ConcNoAgra" id="ConcNoAgra" checked>
            <br>
            <label for="PercIVA">PercIVA</label>
            <input type="checkbox" name="PercIVA" id="PercIVA" checked>
            <label for="PercDGR">PercDGR</label>
            <input type="checkbox" name="PercDGR" id="PercDGR" checked>
            <label for="PercMuni">PercMuni</label>
            <input type="checkbox" name="PercMuni" id="PercMuni" checked>
            <label for="otros">otros</label>
            <input type="checkbox" name="otros" id="otros" checked>
            <label for="total">Total</label>
            <input type="checkbox" name="total" id="total" checked>
            <br><br>
            <button type="submit">Mostrar Tabla</button>

        </form>

        </form>
            <br>
            <form action="" class="datos">
            <button><a href="../Index.php">Volver</a></button>
        </form>

        <br><br><br>
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