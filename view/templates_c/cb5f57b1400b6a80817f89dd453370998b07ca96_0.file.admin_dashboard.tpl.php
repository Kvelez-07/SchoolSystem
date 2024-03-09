<?php
/* Smarty version 4.4.1, created on 2024-03-09 07:52:01
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\admin_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65ec07110f10d2_00960456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb5f57b1400b6a80817f89dd453370998b07ca96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\admin_dashboard.tpl',
      1 => 1709966987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ec07110f10d2_00960456 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>Admin</h1>
    <p>Admin section or go <a href="index.php">back</a></p>

    <h2>User</h2>
    <a href="index.php?action=signup">Create</a> <!-- SignUp User -->
    <a href="index.php?action=read_user">Read</a>
    <a href="index.php?action=delete_user">Delete</a>
    <a href="index.php?action=update_user">Update</a>

    <h2>Subjects</h2>
    <a href="index.php?action=create_subject">Create</a>
    <a href="index.php?action=read_subject">Read</a>
    <a href="index.php?action=delete_subject">Delete</a>
    <a href="index.php?action=update_subect">Update</a>
</body>

</html><?php }
}
