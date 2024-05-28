let longitud = 7;

function creararray(n) {
    if (n <= 0) {
        return [];
    }
    let arreglo = [];
    for (i = 0;i < n; i++) {
        arreglo[i] = i+1;
    }
    return arreglo;
}
let resultado = creararray(longitud);

console.log(resultado);