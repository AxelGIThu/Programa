<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro</title>
</head>
<body>
    
<form action="reporte.php" method="POST">
    <label for="IVA">IVA: </label>
    <select name="IVA" id="IVA">
        <option value="inscripto">Inscripto</option>
        <option value="monotributista">Monotributista</option>
    </select>

    <br>

    <label for="nombre">Nombre: </label>
    <select name="nombre" id="nombre">
        <option value="Juan">Juan</option>
        <option value="Axel Javier Jesus Moscardi">Axel Javier Jesus Moscardi</option>
    </select>

    <br>

    <button type="submit">Generar</button>
</form>

</body>
</html>