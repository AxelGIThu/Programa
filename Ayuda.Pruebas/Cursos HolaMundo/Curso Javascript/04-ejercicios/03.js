function getbyIdx(arr, idx) {
    if (idx >= 0 && idx < arr.length) {
        return arr[idx];
    }
   return 'El indice indicado no se ecuentra en el arreglo';
}

let resultado = getbyIdx([1,2], 2)
console.log(resultado);