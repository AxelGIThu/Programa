function nombreResolucion(ancho, alto) {
    // switch (ancho, alto) {
    //     case (ancho >= 1280 && alto >= 720):
    //         return 'HD';
    //         break;
    
    //     default:
    //         console.log("tamal")
    //         break;
    // }

    if (ancho >= 1280 && alto >= 720) {
        return 'HD';
    } else if (ancho >= 1920 && alto >= 180) {
        return 'FHD';
    } else if (ancho >= 1280 && alto >= 720) {
        return 'WQHD';
    } else if (ancho >= 3840 && alto >= 2160) {
        return '4K';
    } else if (ancho >= 7680 && alto >= 4320) {
        return '8K';
    } else {
        return 'La calidad es mmenor a HD';
    }
}

let nombre = nombreResolucion(1366, 720);
console.log(nombre);