<?php

$valor = 10;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inputHidden.php" method="post">
        <center>
        <input type="hidden" name="escondido" value=<?php echo $valor; ?>>
        <button type="submit">Mostrar valor escondido</button>
        </center>
    </form>
</body>
</html>

<?php

if ($_POST) {
    echo "<center><br>" . $_POST['escondido'] . "</center>";
}

?>