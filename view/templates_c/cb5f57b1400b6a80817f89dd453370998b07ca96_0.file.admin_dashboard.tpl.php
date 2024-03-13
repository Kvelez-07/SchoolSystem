<?php
/* Smarty version 4.4.1, created on 2024-03-13 02:33:59
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\admin_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f10287e55916_16110081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb5f57b1400b6a80817f89dd453370998b07ca96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\admin_dashboard.tpl',
      1 => 1710293625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f10287e55916_16110081 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>

<body>
    <header class="dashboard_header">
        <h1>Admin</h1>
        <p>Admin section or go <a href="index.php">back</a></p>
    </header>

    <div class="user_manipulation">
        <h2>User</h2>
        <a href="index.php?action=signup">Create</a> <!-- SignUp User -->
        <a href="index.php?action=read_user">Read</a>
        <a href="index.php?action=update_user">Update</a>
        <a href="index.php?action=delete_user">Delete</a>
    </div>

    <div class="subject_manipulation">
        <h2>Subjects</h2>
        <a href="index.php?action=create_subject">Create</a>
        <a href="index.php?action=read_subject">Read</a>
        <a href="index.php?action=update_subject">Update</a>
        <a href="index.php?action=delete_subject">Delete</a>
    </div>
</body>

</html><?php }
}
