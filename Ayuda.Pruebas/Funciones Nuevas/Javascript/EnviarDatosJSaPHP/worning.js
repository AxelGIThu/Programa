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