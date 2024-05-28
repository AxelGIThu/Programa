let user = {
    id : 1,
    name : 'Chanchito feliz',
    age : 25
};

for (let prop in user) {
    console.log(prop, user[prop]);
}

let animales = ['a', 'b', 'c'];
for (let indice in animales){
    console.log(indice, animales[indice])
}