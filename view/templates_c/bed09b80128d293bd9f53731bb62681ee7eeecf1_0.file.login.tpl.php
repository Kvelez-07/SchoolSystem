<?php
/* Smarty version 4.4.1, created on 2024-03-02 21:17:13
  from 'C:\xampp\htdocs\progra\progra\proyecto\view\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e38949c2b419_24385736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bed09b80128d293bd9f53731bb62681ee7eeecf1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\progra\\progra\\proyecto\\view\\templates\\login.tpl',
      1 => 1709409726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e38949c2b419_24385736 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <?php echo '<script'; ?>
 defer src="js/script.js"><?php echo '</script'; ?>
>
    <title>School</title>
</head>

<body>
    <main>
        <div class="logo">
            <a href="index.php"> <img src="https://sess.cr/wp-content/uploads/2021/08/IMG_2214-300x136.png"
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
                        <li>
                            <form action="index.php" method="post"> <button type="submit" id="signup" name="signup">Sign
                                    Up</button> </form>
                        </li>
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
                <input type="submit" name="login" value="Login">
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

</html><?php }
}
