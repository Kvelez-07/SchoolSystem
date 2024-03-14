<?php
/* Smarty version 4.4.1, created on 2024-03-14 00:54:35
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\create_subject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f23cbba92bc2_57970855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94d5f2a77405f1402da50ee25859a39520a5a515' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\create_subject.tpl',
      1 => 1710374067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f23cbba92bc2_57970855 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="css/create_subject.css">
</head>

<body>
    <header class="create_subject_header">
        <h1>Subject Creation</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <select name="subject_name">
                <h3>Subject:</h3>
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="create_subject" value="Create">
        </form> <br><br>
    </div>
</body>

</html><?php }
}
