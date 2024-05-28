// Personaje de TV
let nombre = "Piko";
let anime = "Boku no piko";
let edad = 14;

let Personaje={
    nombre : "Piko", // par llave-valor
    anime : "Boku no piko",
    edad : 14,
};
console.log(Personaje);
console.log(Personaje.nombre);
console.log(Personaje['anime']);

Personaje.edad = 13;

Personaje['edad'] = 16;

delete Personaje.anime;

console.log(Personaje);