<?php
/* Smarty version 4.4.1, created on 2024-03-06 19:04:15
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e8b01f512f33_52106208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5759710ace54501c7855d7779b0ee4a5a8fb799f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\signup.tpl',
      1 => 1709748251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e8b01f512f33_52106208 (Smarty_Internal_Template $_smarty_tpl) {
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
            <input type="submit" name="logInUser" value="LogIn">
        </form>
    </div>

    <div class="main-page">
        <button type="submit" id="main" name="main" onclick="window.location.href='index.php'">Back</button>
    </div>
</body>

</html><?php }
}
