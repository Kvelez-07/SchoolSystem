<?php
/* Smarty version 4.4.1, created on 2024-03-02 21:17:28
  from 'C:\xampp\htdocs\progra\progra\proyecto\view\templates\signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e3895881f233_26586628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8725b34be932981ac9735f9822100406fc3e6e0a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\progra\\progra\\proyecto\\view\\templates\\signup.tpl',
      1 => 1709409726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e3895881f233_26586628 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/singup.css">
</head>

<body>
    <div id="main-form">
        <form action="index.php" method="post">
            <h1>Registro</h1>
            <p>Favor de rellenar todos los campos</p>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <select name="user_type" id="user_type" name="user_type" title="user_type" required>
                <option value="Student">Alumno</option>
                <option value="Teacher">Profesor</option>
            </select>
            <input type="submit" name="addUser" value="AddUser">
        </form>
    </div>

    <div class="main-page">
        <button type="submit" id="back" name="back" onclick="window.location.href='index.php'">Back</button>
    </div>
</body>

</html><?php }
}
