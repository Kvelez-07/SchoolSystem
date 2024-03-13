<?php
/* Smarty version 4.4.1, created on 2024-03-13 19:05:15
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\create_subject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f1eadb0343d6_76910327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94d5f2a77405f1402da50ee25859a39520a5a515' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\create_subject.tpl',
      1 => 1710353113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f1eadb0343d6_76910327 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <h1>Subject Creation</h1>
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
