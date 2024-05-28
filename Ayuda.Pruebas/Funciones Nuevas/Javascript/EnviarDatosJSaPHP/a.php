<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript">
        function datosPrompt() {
            let decicion = confirm("Cliente ingresado no registrado, desea registrarlo?");
            
            if (decicion == true) {
                let CUIT = prompt("Ingrese el CUIT del cliente");
                let nombre = prompt("Ingrese el nombre completo del cliente");
                let IVA = prompt("Ingrese el IVA: inscripto/monotributista (escríbalo sin mayúsculas)");
            
                let datos = CUIT + "." + nombre + "." + IVA;
            
                var padre = document.getElementById("formulario");
                var elemento = document.createElement("input");
            
                elemento.setAttribute("type","hidden");
                elemento.setAttribute("name","datosPrompt");
                elemento.setAttribute("value", datos);
            
                padre.appendChild(elemento);
            
                padre.submit();
            }
            }
    </script>
    
    <title>Document</title>
</head>
<body>

<center>
<form action="accion.php" method="POST" id="formulario">
    
    <label for="t1">t1: </label>
    <input type="text" name="t1" id="t1">
    <br>
    <label for="t2">t2: </label>
    <input type="text" name="t2" id="t2">
    <br>

    <button type="submit" href="javascript:{}" onclick="datosPrompt()">Enviar</button>

</form>    
</center>

</body>
</html>