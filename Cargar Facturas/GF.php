<?php

$mac="localhost"; // servidor
$usuar="root"; // permisos
$pass=""; // contraseña
$bas=""; // nombre de la bd
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleGF.css">
    <title>Gen.Facturas</title>
</head>
<body>

    <header>
        <h1>Cargar Facturas</h1>
    </header>
    
    <section>

        <!--<datalist id=''> 
                <option value=""></option>
            </datalist>              
        -->
        
        <article>
            
            <!-- Lista de recomendaciones para los input ID y ID2 (cliente y comprador o vendedor) -->
            <datalist id="lista">
                <?php  include '../funciones.php'; ListaClientes(); ?>
            </datalist>

            <br>
            <form action="GF.php" method="post" class="datos" id="formulario">

            <label for="ID">Cliente: </label>
            <input type="text" list='lista' name="ID" id="ID" required>
            <br>
            <br>

            <label for="ID2">Comprador/Vendedor </label>
            <input type="text" list='lista' name="ID2" id="ID2" required>
            <br>
            <br>

            <label for="comprobante">Comprobante: </label>
            <input type="date" name="comprobante" id="comprobante" required>
            <br>
            <br>
            
            <label for="procesamiento">Procesamiento: </label>
            <input type="date" name="procesamiento" id="procesamiento" required>
            <br>
            <br>
            
            <label for="movimiento">Movimiento: </label>
            <select name="movimiento" id="movimiento" required>
                <?php include 'opcionesMov.php';?>
            </select>
            <br>
            <br>
            
            <label for="TImputacion">Tipo de Imputacion: </label>
            <select name="TImputacion" id="TImputacion" required>
                <?php include 'opcionesTImp.php';?>
            </select>
            <br>
            <br>

            <label for="TComprobante">Tipo de Comprobante: </label>
            <select name="TComprobante" id="TComprobante" required>
                <?php include 'opcionesTCom.php'; ?>
            </select>
            <br>
            <br>
            
            <label for="NComprobante">Numero de Comprobante: </label>
            <input type="text" name="NComprobante" id="NComprobante" placeholder="A1234.12345678" required>
            <br>
            <br>

            <label for="importe">Importe: </label>
            <input type="number" name="importe" id="importe" step="0.01" required>
            <br>
            <br>

            <label for="neto10y5">Neto 10,5%: </label>
            <input type="number" name="neto10y5" id="neto10y5" step="0.01">
            <br>
            <br>

            <label for="neto21">Neto 21%: </label>
            <input type="number" name="neto21" id="neto21" step="0.01">
            <br>
            <br>
            
            <label for="neto27">Neto 27%: </label>
            <input type="number" name="neto27" id="neto27" step="0.01">
            <br>
            <br>
            
            <label for="ConcNoAgra">Concepto No Agrabado: </label>
            <input type="number" name="ConcNoAgra" id="ConcNoAgra" step="0.01">
            <br>
            <br>

            <label for="PercIVA">Percepcion IVA: </label>
            <input type="number" name="PercIVA" id="PercIVA" step="0.01">
            <br>
            <br>

            <label for="PercDGR">Percerpcion DGR: </label>
            <input type="number" name="PercDGR" id="PercDGR" step="0.01">
            <br>
            <br>
            
            <label for="PercMuni">Percepcion Municipalidad: </label>
            <input type="number" name="PercMuni" id="PercMuni" step="0.01">
            <br>
            <br>

            <label for="otros">Otros: </label>
            <input type="number" name="otros" id="otros" step="0.01" >
            <br>
            <br>

            <input type="submit" value="Generar"> 

            </form>
            <br>
            <form action="" class="datos">
            <button><a href="../Index.php">Volver</a></button>
            </form>
            <br>
        </article>
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
$coneccion=mysqli_connect($mac, $usuar, $pass, 'libro');

/* connect_errno llama/trae el ultimo codigo de error
puede ser usado para referenciar a un error en caso de que ocurra como acá abajo
*/
if ($coneccion->connect_errno) {
    echo "Fallo la conexion " . $coneccion->connect_error;
}

if ($_POST) {

    include 'definirVariables.php';

    if (isset($_POST['datosPrompt'])) {

        $datoArray = $_POST['datosPrompt'];
        $datos = explode(".",$datoArray);
        $existe = 3;
        $repetido = 0;

        $coneccion = ConectarLibro();
        $datosVerif = mysqli_query($coneccion, "SELECT nombre FROM clientes");
        while ($nombreVerif = mysqli_fetch_array($datosVerif)) {
            if ($nombreVerif[0] == $datos[1]) {
                $repetido++;
            }
        }

        if ($repetido == 0) {
            NuevoCliente($datos['0'], $datos['1'],$datos['2']);
        }
        
    } else {
    

    $tabla2 = mysqli_query($coneccion, "SELECT IDCliente FROM clientes");

    while ($row = mysqli_fetch_array($tabla2)) {
        if ($row[0] == $ID2) {
            $existe++;
        }
        if ($row[0] == $ID) {
            $existe++;
        }
    }

    if ($existe < 2) {
            echo
                "<script type='text/javascript'>
                    let decicion = confirm(`Cliente ingresado no registrado, desea registrarlo?`);

                    if (decicion == true) {
                        let CUIT = prompt(`Ingrese el CUIT del cliente`);
                        let nombre = prompt(`Ingrese el nombre completo del cliente`);
                        let IVA = prompt(`Ingrese el IVA: inscripto/monotributista (escríbalo sin mayúsculas)`);
                    
                        let datos = CUIT + `.` + nombre + `.` + IVA;

                        var padre = document.getElementById(`formulario`);
                        var elemento = document.createElement(`input`);
                    
                        elemento.setAttribute(`type`,`hidden`);
                        elemento.setAttribute(`name`,`datosPrompt`);
                        elemento.setAttribute(`value`, datos);
                    
                        padre.appendChild(elemento);
                    
                        padre.submit();
                    }
                </script>";
    } else {

    $tabla2 = mysqli_query($coneccion, "SELECT CUIT, nombre, IVA FROM clientes WHERE IDCliente = $ID");

    while ($row = mysqli_fetch_array($tabla2)) {
        $CUIT = $row[0];
        $nombre = $row[1];
        $IVA = $row[2];
    }

    $tabla2 = mysqli_query($coneccion, "SELECT nombre FROM clientes WHERE IDCliente = $ID2");

    while ($row = mysqli_fetch_array($tabla2)) {
        $nombre2 = $row[0];
    }

    // Los clientes se identifican por CUIL pero yo lo hago por IDCliente
    // Completar los IF's con papá
    
    $mysqli = new mysqli('localhost','root','','libro');

    $ID_str= $mysqli->real_escape_string($_POST['ID']);
    if ($_POST['movimiento'] == "Compra") {
        $nombreTabla = "compras" . $ID_str;
    } else {
        $nombreTabla = "ventas" . $ID_str;
    }

    include 'IVA.php';

    $total=(($neto10y5+$IVA10y5)+($neto21+$IVA21)+($neto27+$IVA27)+$ConcNoAgra+$PercDGR+$PercIVA+$PercMuni+$otros+$importe);

    mysqli_query($coneccion, "INSERT INTO `$nombreTabla` (`NFactura`, `comprobante`, `procesamiento`, `TComprobante`, `NComprobante`, `movimiento`, `Timputacion`, `CUIT`, `nombre`, `CompVend`, `importe`, `neto21`, `IVA21`, `neto10y5`, `IVA10y5`, `neto27`, `IVA27`, `ConcNoAgra`, `PercIVA`, `PercDGR`, `PercMuni`, `otros`, `total`) 
                                                  VALUES ('', '$comprobante', '$procesamiento', '$TComprobante', '$NComprobante', '$movimiento', '$TImputacion', '$CUIT', '$nombre', '$nombre2', '$importe', '$neto21', '$IVA21', '$neto10y5', '$IVA10y5', '$neto27', '$IVA27', '$ConcNoAgra', '$PercIVA', '$PercDGR', '$PercMuni', '$otros', '$total')");

}
}
}
?>