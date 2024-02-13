function mostrarInformacion(idContenido) {
    var contenido = '';

    switch(contenido) {
        case 'mostrarLocalizacion':
            break;
        case 'mostrarCaracteristicas':
            break;
        case 'mostrarInstalaciones':
            break;
        case 'mostrarServicios':
            break;
        case 'mostrarInformacion':
            break;
        case 'mostrarProyectos':
            break;
        default:
            break;
    }
    document.getElementById('contenido').innerHTML = contenido;
}

var datos = {
    mostrarLocalizacion: 'Aquí puedes encontrar nuestra ubicacion y direcciones.',
    mostrarCaracteristicas: 'Estas son las caracteristícas principales de nuestro producto/servicio.',
    mostrarInstalaciones: 'Nuestras instalaciones',
    mostrarInformacion: 'Informacion importante.',
    mostrarServicios: 'Nuestros servicios',
    mostrarProyectos: 'Nuestros proyectos'
};

// Funcion para mostrar la informacion en el div de contenido
function mostrarInformacion(opcion) {
    var contenidoDiv = document.getElementById('contenido');
    contenidoDiv.innerHTML = datos[opcion] || 'No se encontraron datos para esta opci�n.';
}