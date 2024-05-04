<?php  
    $coneccion = mysqli_connect('localhost', 'root', '', 'libro');
        $tabla = mysqli_query($coneccion, "SELECT * FROM clientes");
        while ($datos = mysqli_fetch_array($tabla)) {
            ?>
                <option value="<?php echo $datos['IDCliente'];?>"><?php  echo $datos['IDCliente'] . " - " . $datos['nombre'] ?></option>
            <?php
            }
    mysqli_close($coneccion);
?>