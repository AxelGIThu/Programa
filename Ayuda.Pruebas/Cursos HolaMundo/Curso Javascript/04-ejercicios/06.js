let array = [2,5,7,15,-5,-100,55];

function cuantosPositivos(arr) {
    let Positivo = 0;
    let Negativo = 0;
    for (numero of arr) {
        if (numero >= 0) {
            Positivo++
        }else
        {
            Negativo++
        }
    }
    let array = [Negativo, Positivo];
    return array;
}

let resultado = cuantosPositivos(array);
console.log(resultado);