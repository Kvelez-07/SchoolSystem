<?php
/* Smarty version 4.4.1, created on 2024-03-10 07:48:05
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\delete_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65ed57a533cac6_85860800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8226102d43c1339c845ac2557b83cda558474cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\delete_user.tpl',
      1 => 1710053216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ed57a533cac6_85860800 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="css/delete_user.css">
</head>

<body>

    <header class="delete_user_header">
        <h1>Delete</h1>
    </header>

    <div class="delete_user_form">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <select name="user_type" id="user_type">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name1" placeholder="Last Name1">
            <input type="text" name="last_name2" placeholder="Last Name2"><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="delete_user" value="Delete">
        </form>
    </div>
</body>

</html><?php }
}
