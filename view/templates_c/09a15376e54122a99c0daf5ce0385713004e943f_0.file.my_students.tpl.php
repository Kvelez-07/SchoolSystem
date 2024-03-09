<?php
/* Smarty version 4.4.1, created on 2024-03-09 19:55:40
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_students.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65ecb0acc66352_02100088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09a15376e54122a99c0daf5ce0385713004e943f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_students.tpl',
      1 => 1709967562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ecb0acc66352_02100088 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/teacher.css">
    <title>Mis Estudiantes</title>
</head>

<body>
    <h1>Estudiantes del Profesor</h1>

    <form action="index.php" method="POST">
        <select name="subject">
            <!-- materia -->
            <option value="spanish">Español</option>
            <option value="social_studies">Estudios Sociales</option>
            <option value="science">Ciencias</option>
            <option value="math">Mate</option>
        </select>
        <input type="submit" name="get_students" value="Alumnos">
    </form>

    <table border="2">
        <thead>
            <tr>
                <td>Estudiante</td>
                <td>Materia</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                            </tr>
        </tbody>
    </table>

    <div class="Exit1">
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html><?php }
}
