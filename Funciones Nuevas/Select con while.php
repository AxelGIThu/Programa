<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <br>
    <label for="a">Cliente: </label>
    <select name="a" id="a">
        <?php
        
        $coneccion = mysqli_connect('localhost', 'root', '', 'libro');
        $tabla = mysqli_query($coneccion, "SELECT * FROM clientes");

        while ($datos = mysqli_fetch_array($tabla)) {
?>
            <option value="<?php $datos['IDCliente']?>"><?php  echo $datos['IDCliente'] . " - " . $datos['nombre'] ?></option>
        <?php
        }

        mysqli_close($coneccion);

        ?>
    </select>
</body>
</html>