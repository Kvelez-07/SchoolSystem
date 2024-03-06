<?php
/* Smarty version 4.4.1, created on 2024-03-06 23:40:34
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e8f0e2d6de99_46421820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f642e08c5f45464da60a2395167fae831fd09de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\login.tpl',
      1 => 1709764829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e8f0e2d6de99_46421820 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="main-form">
        <form action="index.php" method="post">
            <h1>Login</h1>
            <p>Favor rellenar todos los campos</p>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <select name="user_type" id="user_type" name="user_type" title="user_type" required>
                <option value="Student">Alumno</option>
                <option value="Teacher">Profesor</option>
            </select>
            <input type="submit" name="logUser" value="LogIn">
        </form>
    </div>

    <div class="main-page">
        <a href="index.php"><button id="main" name="main">Back</button></a>
    </div>
</body>

</html><?php }
}
