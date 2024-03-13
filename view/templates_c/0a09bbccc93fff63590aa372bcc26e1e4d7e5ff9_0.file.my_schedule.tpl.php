<?php
/* Smarty version 4.4.1, created on 2024-03-13 23:23:04
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_schedule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f227484293b6_32736393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a09bbccc93fff63590aa372bcc26e1e4d7e5ff9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_schedule.tpl',
      1 => 1710368581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f227484293b6_32736393 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/student.css">
    <title>Horarios</title>
</head>

<body>
    <h1>Horario Estudiantil</h1><br>

    <form action="index.php" method="POST">
        <select name="subject">
            <!-- materia -->
            <option value="spanish">Español</option>
            <option value="social_studies">Estudios Sociales</option>
            <option value="science">Ciencias</option>
            <option value="math">Mate</option>
        </select>
        <input type="submit" name="get_schedule" value="Horario">
    </form><br><br>

    <table border="2">
        <thead>
            <tr>
                <td>Materia</td>
                <td>Duracion</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                            </tr>
        </tbody>
    </table>

    <div class="Exit1">
        <a id="link" href="index.php?action=students_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html><?php }
}
