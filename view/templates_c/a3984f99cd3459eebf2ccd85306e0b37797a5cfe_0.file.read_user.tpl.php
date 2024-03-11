<?php
/* Smarty version 4.4.1, created on 2024-03-10 07:53:14
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\read_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65ed58da6e2913_79597812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3984f99cd3459eebf2ccd85306e0b37797a5cfe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\read_user.tpl',
      1 => 1710053592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ed58da6e2913_79597812 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="css/read_user.css">
</head>

<body>
    <header class="read_user_header">
        <h1>Read</h1>
    </header>

    <div class="read_user_form">
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
    </div>

    <div class="read_user_table">
        <table>
            <thead>
                <tr>
                    <td>User</td>
                    <td>Type</td>
                    <td>First Name</td>
                    <td>Last Name1</td>
                    <td>Last Name2</td>
                </tr>
            </thead>
            <tbody>
                <td>
                                    </td>
            </tbody>
        </table>
    </div>
</body>

</html><?php }
}
