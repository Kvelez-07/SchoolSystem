<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/script.js"></script>
    <title>School</title>
</head>

<body>
    <main>
        <div class="logo">
            <a href="login.tpl"> <img src="https://sess.cr/wp-content/uploads/2021/08/IMG_2214-300x136.png"
                    alt="Academy logo"></a>
        </div>

        <div class="menu">
            <header>
                <nav id="menu">
                    <ul>
                        <li><a href="#" onclick="mostrarInformacion(`mostrarLocalizacion`)">
                                <h3>Localización</h3>
                            </a></li>
                        <!--falta poner los vinculos-->
                        <li><a href="#" onclick="mostrarInformacion(`mostrarCaracteristicas`)">
                                <h3>Características</h3>
                            </a></li>
                        <li><a href="#" onclick="mostrarInformacion(`mostrarInstalaciones`)">
                                <h3>Instalaciones</h3>
                            </a></li>
                        <li><a href="#" onclick="mostrarInformacion(`mostrarServicios`)">
                                <h3>Servicios</h3>
                            </a></li>
                        <li><a href="#" onclick="mostrarInformacion(`mostrarInformacion`)">
                                <h3>Información</h3>
                            </a></li>
                        <li><a href="#" onclick="mostrarInformacion(`mostrarProyectos`)">
                                <h3>Proyectos de Escuela</h3>
                            </a></li>
                        <li> <button type="submit" id="signup" name="signup"
                                onclick="window.location.href='/view/signup.tpl'">Sign
                                Up</button></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="login">
            <form action="index.php" method="post">
                <h4>&nbsp;&nbsp;Tipo: </h4> <select id="user_type" name="user_type" title="user_type" required>
                    <option value="Student">Alumno</option>
                    <option value="Teacher">Profesor</option>
                    <option value="Admin">Administrador</option>
                </select>
                <h4>&nbsp;&nbsp;Usuario:</h4><input type="text" id="username" name="username" placeholder="User"
                    required>
                <h4>&nbsp;&nbsp;Clave:</h4> <input type="password" id="password" name="password" placeholder="Password"
                    required>
                <input type="submit" name="submit" value="submit">
            </form>
        </div>

        <div class="contenido" id="contenido">
            <ul>
                <li><img src="img/institution.jpg" alt="Institution image" /></li>
            </ul>
        </div>

        <footer class="piePagina">
            <p>&copy; 2024 My Website. All rights reserved.</p>
        </footer>
        </div>
    </main>
</body>

</html>