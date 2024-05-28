let array = [2,5,7,15,-5-100,55];

function getMenorMayor(arr) {
    let Mayor = 0;
    let Menor = 0;
    // for (let i = 0; i < arr.length; i++) {
    //     Mayor = (Mayor < arr[i] ? arr[i] : Mayor);
    //     Menor = (Menor > arr[i] ? arr[i] : Menor);
    // }
    for (numero of arr) {
        Mayor = (Mayor < numero ? numero : Mayor);
        Menor = (Menor > numero ? numero : Menor);
    }

    let array = [Menor, Mayor];
    return array;
}

let numeros = getMenorMayor(array);
console.log(numeros);