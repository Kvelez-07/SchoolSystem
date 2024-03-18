<?php
/* Smarty version 4.4.1, created on 2024-03-18 18:21:20
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f87810b87662_80560105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b3a7815bee151d30503784ea66b76b72ffec4c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\admin_login.tpl',
      1 => 1710737553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f87810b87662_80560105 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin_login.css">
</head>

<body>
    <div id="main-form">
        <form action="index.php" method="post">
            <!-- Exclusive Login for Admin -->
            <h1>Login</h1>
            <p>Favor rellenar todos los campos</p>
            <input type="hidden" id="admin" name="user_type" value="Admin" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" name="logUser" value="LogIn">
        </form>
    </div>

    <div class="main-page">
        <a href="index.php"><button id="main" name="main">Regresar</button></a>
    </div>
</body>

</html><?php }
}
