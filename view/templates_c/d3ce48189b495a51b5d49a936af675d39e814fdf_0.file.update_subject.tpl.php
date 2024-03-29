<?php
/* Smarty version 4.4.1, created on 2024-03-19 05:27:35
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\update_subject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f91437689430_97701696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3ce48189b495a51b5d49a936af675d39e814fdf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\update_subject.tpl',
      1 => 1710737474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f91437689430_97701696 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/update_subject.css">
</head>

<body>
    <header class="update_subject_header">
        <h1>Subject Update</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <!-- base on DB tables -->
            <input type="number" name="teacher_id" placeholder="teacher_id">
            <input type="number" name="school_levels_id" placeholder="school_levels_id"><br><br>
            <select name="subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>

            <input type="number" name="new_teacher_id" placeholder="new_teacher_id">
            <input type="number" name="new_school_levels_id" placeholder="new_school_levels_id"><br><br>
            <select name="new_subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="update_subject" value="Update">
        </form><br><br>
    </div>
</body>

</html><?php }
}
