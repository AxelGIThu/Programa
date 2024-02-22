

<!DOCTYPE html>
<html>
<head>
    <title>prueba</title>
</head>
<body>

<body>
    <table border="1">
        <th>ID</th><th>Nombre</th>

        <?php

        $mac="localhost"; // servidor
        $usuar="root"; // permisos
        $pass=""; // contraseña
        $bas="libro"; // nombre de la bd

        $coneccion=mysqli_connect($mac, $usuar, $pass, $bas);

        $tabla=mysqli_query($coneccion, "SELECT * FROM clientes");

        while ($datos=mysqli_fetch_array($tabla)) {
            ?>
            <tr>
                <td><?php echo $datos['IDCliente'];?></td>
                <td><?php echo $datos['nombre'];?></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>
    
</body>
</html>