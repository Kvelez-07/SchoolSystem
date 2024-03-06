    function mostrarInformacion(idContenido) {
    var contenido = '';

    switch(idContenido) {
        case 'mostrarUbicacion':
            contenido = datos.mostrarUbicacion || 'No se encontraron datos para esta opci�n.';
            break;
        case 'mostrarCaracteristicas':
            contenido = datos.mostrarCaracteristicas || 'No se encontraron datos para esta opci�n.';
            break;
        case 'mostrarInstalaciones':
            contenido = datos.mostrarInstalaciones || 'No se encontraron datos para esta opci�n.';
            break;
        case 'mostrarServicios':
            contenido = datos.mostrarServicios || 'No se encontraron datos para esta opci�n.';
            break;
        case 'mostrarInformacion':
            contenido = datos.mostrarInformacion || 'No se encontraron datos para esta opci�n.';
            break;
        case 'mostrarProyectos':
            contenido = datos.mostrarProyectos || 'No se encontraron datos para esta opci�n.';
            break;
        default:
            contenido = 'Opci�n no v�lida.';
            break;
    }
    document.getElementById('contenido').innerHTML = contenido;
}
var datos = {
    mostrarUbicacion: 'Aqu� puedes encontrar nuestra ubicaci�n y direcciones.',
    mostrarCaracteristicas: 'Estas son las caracter�sticas principales de nuestro producto/servicio.',
    mostrarInstalaciones: 'Nuestras instalaciones',
    mostrarInformacion: 'Informaci�n importante.',
    mostrarServicios: 'Nuestros servicios',
    mostrarProyectos: 'Nuestros proyectos'
};

function mostrarInformacion(opcion) {
    var contenido = datos[opcion];
    if (contenido) {
        document.getElementById('contenido').innerHTML = contenido;
    } else {
        document.getElementById('contenido').innerHTML = 'No se encontraron datos para esta opci�n.';
    }
}

function mostrarContenidoInicial() {
    document.getElementById("contenido").innerHTML = '<ul><li><img src="img/institution.jpg" alt="Institution image" /></li></ul>';
}
function MostrarUbicacion() {
    var contenidoDiv = document.getElementById("contenido");
    contenidoDiv.innerHTML = ''; // Limpiar contenido anterior

    var ul = document.createElement("ul");

    var direccion = document.createElement("li");
    direccion.innerHTML = '<i class="fas fa-map-marker-alt"></i> Direcci&oacute;n: 123 Calle Lomas, San Jos&eacute;, Costa Rica <a href="https://www.google.com/maps?q=123+Calle+Lomas,+San+Jos%C3%A9,+Costa+Rica" target="_blank">Ver en Google Maps</a>';
    ul.appendChild(direccion);

    var telefono = document.createElement("li");
    telefono.innerHTML = '<i class="fas fa-phone"></i> Tel&eacute;fono: +506 2241 2233';
    ul.appendChild(telefono);

    
    var redesSociales = document.createElement("li");
    redesSociales.textContent = "Redes Sociales:";
    var redesUl = document.createElement("ul");

    var facebook = document.createElement("li");
    var facebookLink = document.createElement("a");
    facebookLink.href = "https://facebook.com/tu_pagina";
    facebookLink.innerHTML = '<i class="fab fa-facebook"></i> Facebook';
    facebook.appendChild(facebookLink);
    redesUl.appendChild(facebook);

    var twitter = document.createElement("li");
    var twitterLink = document.createElement("a");
    twitterLink.href = "https://twitter.com/tu_pagina";
    twitterLink.innerHTML = '<i class="fab fa-twitter"></i> Twitter';
    twitter.appendChild(twitterLink);
    redesUl.appendChild(twitter);

    redesSociales.appendChild(redesUl);
    ul.appendChild(redesSociales);

    contenidoDiv.appendChild(ul);
    
} 
function MostrarInstalaciones() {
    var contenidoDiv = document.getElementById("contenido");
    contenidoDiv.innerHTML = ''; // Limpiar contenido anterior

    // Crear un contenedor para las fotos de las instalaciones
    var fotosContainer = document.createElement("div");
    fotosContainer.id = "fotos-container"; // Agregar el ID para aplicar los estilos CSS
    contenidoDiv.appendChild(fotosContainer);

    // Nombres de las im�genes de instalaciones
    var nombresImagenes = ["sports", "pool", "computers","class"];

    // Crear y agregar las im�genes de instalaciones
    nombresImagenes.forEach(function(nombreImagen) {
        var img = document.createElement("img");
        img.src = "img/" + nombreImagen + ".jpg"; // URL de la imagen de la instalaci�n con el nombre correspondiente
        fotosContainer.appendChild(img);
    });
}
function mostrarSobreNosotros() {
    var contenidoDiv = document.getElementById("contenido");
    contenidoDiv.innerHTML = ''; // Limpiar contenido anterior

    // Crear un cuadro de texto para mostrar la informaci�n sobre nosotros
    var cuadroTexto = document.createElement("div");
    cuadroTexto.classList.add("sobre-nosotros"); // Agregar clase para aplicar estilos CSS
    cuadroTexto.innerHTML = `
        <h2>Sobre Nosotros</h2>
        <p>Sancti Sp&iacute;ritus es una instituci&oacute;n de excelencia que fue creada en 1997 por la Corporaci&oacute;n IMMAESA, S. A., bajo la inspiraci&oacute;n del ideal plat&oacute;nico del Hombre Perfecto; cuyo principio filos&oacute;fico es la trilog&iacute;a divina del autor: Verdad, Bien y Belleza.</p>
    `;
    contenidoDiv.appendChild(cuadroTexto);
}


