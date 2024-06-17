<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onclick</title>
</head>
<body>
    <?php
    $texto = "hola";
    function saludar($texto) {
        echo $texto;
    }
    ?>

    <button onclick=<?php saludar($texto);?>>Saludar</button>

</body>
</html>