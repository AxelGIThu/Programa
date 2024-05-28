function suma (a, b){
    console.log(arguments);
    return a + b;
};

let resultado = suma(10, 10, 10, 10, 10);
console.log(resultado);
console.log(typeof suma);