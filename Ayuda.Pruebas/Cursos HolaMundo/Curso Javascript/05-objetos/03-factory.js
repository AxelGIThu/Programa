function crearUsuario(name, email) {
    return {
        id: 1,
        email,
        name,
        activo: true,
        recuperarClave: function () {
            console.log('Recuperando clave...');
        },
    };
}

let user1 = crearUsuario('Nicolas', 'nico@holamundo.cio')
let user2 = crearUsuario('Chanchito', 'chanchito@holamundo.cio')

console.log(user1, user2);