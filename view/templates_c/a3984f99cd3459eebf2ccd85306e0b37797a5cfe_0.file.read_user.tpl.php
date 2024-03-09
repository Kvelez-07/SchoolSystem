<?php
/* Smarty version 4.4.1, created on 2024-03-09 22:40:36
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\read_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65ecd754bab227_63964330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3984f99cd3459eebf2ccd85306e0b37797a5cfe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\read_user.tpl',
      1 => 1710020434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ecd754bab227_63964330 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Read</h1>

    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <select name="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name1" placeholder="Last Name1">
        <input type="text" name="last_name2" placeholder="Last Name2"><br><br>
        <a href="index.php?action=admin_dashboard">Back</a> or
        <input type="submit" name="read_user" value="Read">
    </form> <br><br>

    <table>
        <thead>
            <tr>
                <td>Username</td>
                <td>User Type</td>
                <td>First Name</td>
                <td>Last Name 1</td>
                <td>Last Name 2</td>
            </tr>
        </thead>
        <tbody>
            <td>
                            </td>
        </tbody>
    </table>
</body>

</html><?php }
}
