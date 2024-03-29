<?php
/* Smarty version 4.4.1, created on 2024-03-20 01:56:06
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65fa3426b38010_07697051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64db2aabed8840e37379ed111f2c0fd95d26a8ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\main.tpl',
      1 => 1710825569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fa3426b38010_07697051 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?php echo '<script'; ?>
 defer src="js/main.js">

    <?php echo '</script'; ?>
>
    <title>School</title>
</head>

<body>
    <div class="opciones-superiores">

        <header>
            <h1>CENTRO EDUCATIVO SAINCTI SPIRITUS</h1>
            <nav id="opciones">

                <ul class="menu-derecha">
                    <!-- JS functions -->
                    <li><a href="index.php?action=admin_login">Registro</a></li> <!-- Admin Privileges -->
                    <li><a href="#" onclick="mostrarContenidoInicial('contenido');">Hogar</a></li>
                    <li><a href="#" onclick="mostrarSobreNosotros('contenido');">Sobre nosotros</a></li>
                    <li><a href="#" onclick="MostrarUbicacion('contenido');">Contacto</a></li>
                    <li><a href="#" onclick="MostrarInstalaciones('contenido');">Instalaciones</a></li>
                    <li>
                        <form action="index.php" method="post">
                            <button type="submit" id="login" name="login" class='login'>Ingresar</button>
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

</html><?php }
}
