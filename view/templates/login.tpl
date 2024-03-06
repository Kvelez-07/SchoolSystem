<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script defer src="js/script.js">

    </script>
    <title>School</title>
</head>

<body>
    <div class="opciones-superiores">

        <header>
            <h1>CENTRO EDUCATIVO SAINCTI SPIRITUS</h1>
            <nav id="opciones">

                <ul class="menu-derecha">

                    <li><a href="#" onclick="mostrarContenidoInicial('contenido');">Hogar</a></li>
                    <li><a href="#" onclick="mostrarSobreNosotros('contenido');">Sobre nosotros</a></li>
                    <li><a href="#" onclick="MostrarUbicacion('contenido');">Contacto</a></li>
                    <li><a href="#" onclick="MostrarInstalaciones('contenido');">Instalaciones</a></li>
                    <li>
                        <form action="index.php" method="post">
                            <button type="submit" id="signup" name="signup" class='signup'>Ingresar</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="contenido" id="contenido">

        <li><img src="img/institution.jpg" alt="Institution image" /></li>

    </div>


    <footer class="piePagina">
        <p>&copy; 2024 My Website. All rights reserved.</p>
    </footer>
</body>

</html>