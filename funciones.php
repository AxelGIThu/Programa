<?php

function ConectarLibro() {
    return $coneccion = mysqli_connect('localhost', 'root', '', 'libro');
}

function NuevoCliente ($CUIT, $nombre, $IVA) {
// Permite añadir clientes a la base de datos "clientes".

$coneccion = ConectarLibro();

if ($CUIT == null or $nombre == null or $IVA == null) {
    echo "Alguno de los siguientes datos no fueron ingresados al intentar cargar un cliente: CUIT, IVA, nombre";
}

    $count=0;
    $count = ContarClientes();
    $count2 = $count;

    mysqli_query($coneccion, "CREATE TABLE `compras$count` (NFactura int AUTO_INCREMENT PRIMARY KEY ,comprobante date, procesamiento date, TComprobante varchar(50), NComprobante varchar(15), movimiento varchar(50), TImputacion varchar(50), 
    CUIT varchar(11), nombre text(100), CompVend text(100), importe decimal(10,2), neto21 decimal(10,2), IVA21 decimal(10,2), neto10y5 decimal(10,2), IVA10y5 decimal(10,2), 
    neto27 decimal(10,2), IVA27 decimal(10,2), ConcNoAgra decimal(10,2), PercIVA decimal(10,2), PercDGR decimal(10,2), 
    PercMuni decimal(10,2), otros decimal(10,2), total decimal(10,2)) ENGINE='innoDB'");

    mysqli_query($coneccion, "CREATE TABLE `ventas$count` (NFactura int AUTO_INCREMENT PRIMARY KEY ,comprobante date, procesamiento date, TComprobante varchar(50), NComprobante varchar(13), movimiento varchar(50), TImputacion varchar(50), 
    CUIT varchar(11), nombre text(100), CompVend text(100), importe decimal(10,2), neto21 decimal(10,2), IVA21 decimal(10,2), neto10y5 decimal(10,2), IVA10y5 decimal(10,2), 
    neto27 decimal(10,2), IVA27 decimal(10,2), ConcNoAgra decimal(10,2), PercIVA decimal(10,2), PercDGR decimal(10,2), 
    PercMuni decimal(10,2), otros decimal(10,2), total decimal(10,2)) ENGINE='innoDB'");

    /* Orden: Fecha de factura; fecha de procesamiento; tipo de comprobante; tipo de imputación; 
    CUIT; Apellido y Nombre o Razón social; Neto 21; iva 21; Neto 10.5; iva 10.5; 
    Neto 27; iva 27; Conceptos No Gravados; Percepción de IVA; Percepción DGR, 
    Percepción Municipalidad y Total
    */

    /* Tipo de imputación: Fuente de gasto o ganancia; verduleria, gasolineria, flete, etc */
    mysqli_query($coneccion, "INSERT INTO `clientes` (`IDCliente`, `nombre`, `CUIT`, `IVA`) VALUES ('$count2', '$nombre', '$CUIT', '$IVA');");

    mysqli_close($coneccion);

}

function ContarClientes() {
    // Permite contar la cantidad de clientes de la base de datos "clientes".
    // Es usado para la creación de nuevos clientes para la IDCliente.
    
    $CantClientes = 1;
    $coneccion = ConectarLibro();
    $tabla = mysqli_query($coneccion, "SELECT * FROM clientes");
    while ($datos = mysqli_fetch_array($tabla)) {
            $CantClientes++;
        }
    mysqli_close($coneccion);
    return $CantClientes;
}

function ListaClientes(){
    $coneccion = ConectarLibro();

    // Busca el IDCliente, Nombre, CUIT e IVA de todos los clientes
    $tabla = mysqli_query($coneccion, "SELECT * FROM clientes");

    // Genera una opción por cada cliente, cada una muestra el nombre y cuit del cliente pero el valor de la opcion es la IDCliente.
    while ($datos = mysqli_fetch_array($tabla)) {
        ?>
            <option value="<?php echo $datos['IDCliente'];?>"><?php  echo $datos['nombre'] . " "; echo $datos['CUIT'] ?></option>
        <?php
        }
    
    mysqli_close($coneccion);
}

function ModificarCliente($array){
    $coneccion = ConectarLibro();

if (isset($array['NuevoNombre'])) {
    mysqli_query($coneccion, "UPDATE clientes SET nombre = '" . $array['NuevoNombre'] . "' WHERE nombre = '" . $array['ViejoNombre'] . "';");
}

if (isset($array['NuevoCUIT'])) {
    mysqli_query($coneccion, "UPDATE clientes SET CUIT = " . $array['NuevoCUIT'] . " WHERE CUIT = " . $array['ViejoCUIT'] . ";");
}

if (isset($array['NuevoIVA'])) {
    // Las comillas simples indican que el valor es un texto, caso contrario la query falla porque lo identifica como columna y no lo encuentro.
    mysqli_query($coneccion, "UPDATE clientes SET IVA = '" . $array['NuevoIVA'] . "' WHERE IVA = '" . $array['ViejoIVA'] . "';");
}

mysqli_close($coneccion);

}

function CrearTDparaModif($campo, $ValorViejo) {
    echo "<form action='M-Registro.php' method='post'>";
    echo    "<td>";
    echo        '<input type="text" name="Nuevo' . $campo . '" required>';
    echo        '<input type="hidden" name="Viejo' . $campo . '" value="' . $ValorViejo . '">';
    echo        '<br><button type="submit" onclick=' . ModificarCliente($_REQUEST) . '>Modificar</button>';
    echo    "</td>";
    echo "</form>";
}

?>