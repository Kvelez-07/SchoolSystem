<?php
/* Smarty version 4.4.1, created on 2024-03-18 19:39:24
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\update_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f88a5c1de2c3_41994479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4e33060db7544bd4b9ab1a61c4c054b61e270db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\update_user.tpl',
      1 => 1710737508,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f88a5c1de2c3_41994479 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/update_user.css">
</head>

<body>
    <header class="update_user_header">
        <h1>Update</h1>
    </header>

    <div class="update_user_form">
        <form action="index.php" method="POST">
            <!-- based on DB values -->
            <p>Verification: </p>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <select name="user_type" id="user_type">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select><br><br>

            <p>New data (unnecessary updates can be left with previous values):</p>
            <input type="text" name="new_username" placeholder="New Username">
            <input type="password" name="new_password" placeholder="New Password">
            <input type="text" name="new_first_name" placeholder="New First Name">
            <input type="text" name="new_last_name1" placeholder="New Last Name1">
            <input type="text" name="new_last_name2" placeholder="New Last Name2">
            <input type="text" name="new_email" placeholder="New Email">
            <input type="text" name="new_phone" placeholder="New Phone"><br><br>

            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="update_user" value="Update">
        </form>
    </div>

</body>

</html><?php }
}
