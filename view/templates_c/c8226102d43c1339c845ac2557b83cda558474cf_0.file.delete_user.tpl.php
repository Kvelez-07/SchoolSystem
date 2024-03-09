<?php
/* Smarty version 4.4.1, created on 2024-03-09 21:59:03
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\delete_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65eccd977f9aa7_37774377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8226102d43c1339c845ac2557b83cda558474cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\delete_user.tpl',
      1 => 1710017932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65eccd977f9aa7_37774377 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Delete</h1>

    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <select name="user_type" id="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name"><br><br>
        <a href="index.php?action=admin_dashboard">Back</a> or
        <input type="submit" name="read_user" value="Read">
    </form>
</body>

</html><?php }
}
