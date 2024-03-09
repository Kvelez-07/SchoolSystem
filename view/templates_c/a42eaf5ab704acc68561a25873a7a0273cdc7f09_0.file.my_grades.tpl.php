<?php
/* Smarty version 4.4.1, created on 2024-03-09 06:56:30
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_grades.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65ebfa0e6a8ea5_80919802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a42eaf5ab704acc68561a25873a7a0273cdc7f09' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_grades.tpl',
      1 => 1709963784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ebfa0e6a8ea5_80919802 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/student.css">
    <title>Notas</title>

    <style>
        body {
            background-image: url('img/subjects.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        form {
            margin: 0 auto;
            width: 400px;
            /* Esquema del formulario */
            padding: 1em;
            border: 1px solid ccc;
            border-radius: 1em;
        }
    </style>
</head>

<body>
    <div id="main-form">
        <form>
            <h1>Materias</h1>
            <p>Favor seleccionar la asignatura</p>
            <select name="subjects" id="lang" required>
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
                <input type="submit" name="get_grades" value="Notas">
            </select>
        </form>

        <table border="2">
            <thead>
                <tr>
                    <td>Prueba 1</td>
                    <td>Prueba 2</td>
                    <td>Prueba 3</td>
                    <td>Tarea 1</td>
                    <td>Tarea 2</td>
                    <td>Asistencia</td>
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
