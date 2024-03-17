<?php
/* Smarty version 4.4.1, created on 2024-03-17 20:24:48
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\delete_subject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f74380b1be03_31527707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4590e85c02a5ee530bc32136480a0129a64f5db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\delete_subject.tpl',
      1 => 1710703485,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f74380b1be03_31527707 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="css/delete_subject.css">
</head>

<body>
    <header class="delete_subject_header">
        <h1>Subject Deletion</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <input type="number" name="teacher_id" placeholder="teacher_id">
            <input type="number" name="school_levels_id" placeholder="school_levels_id"><br><br>
            <select name="subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="delete_subject" value="Delete">
        </form> <br><br>
    </div>
</body>

</html><?php }
}
