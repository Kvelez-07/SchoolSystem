function mostrarInformacion(idContenido) {
    var contenido = '';

 switch(idContenido) {
        case 'mostrarLocalizacion':
            contenido = 'LOCALIZACIONES';
            break;
        case 'mostrarCaracteristicas':
            contenido = 'CARACTERISTICAS';
            break;
        case 'mostrarInstalaciones':
            contenido = 'INSTALACIONES';
            break;
        case 'mostrarServicios':
            contenido = 'SERVICIOS';
            break;
            case 'mostrarInformacion':
            contenido = 'INFORMACION';
            break;
            case 'mostrarProyectos':
            contenido = 'PROYECTOS';
            break;
            default:
            contenido = 'Contenido no encontrado';
            break;
            
            
    }
    document.getElementById('contenido').innerHTML = contenido;
    }
