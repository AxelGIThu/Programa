let arry = [{
    id : 1,
    name : 'Nicolas',
}, {
    id : 2,
    name : 'Felipe',
}, {
    id : 3,
    name : 'Chanchito',
}];

// let pares = [
//     [1, {id : 1, name : 'Nicolas'}],  
//     [2, {id : 2, name : 'Felipe'}], 
//     [3, {id : 3, name : 'Chanchito'}],
// ]

function toPairs(arr) {
    let pares = [];
    for (idx in arr) {
        elementos = arr[idx];
        pares[idx] = [elementos.id, elementos.name]
    }
    return pares;
}

let par = toPairs(arry);
console.log(par);