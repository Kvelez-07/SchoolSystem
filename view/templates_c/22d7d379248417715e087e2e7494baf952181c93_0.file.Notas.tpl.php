<?php
/* Smarty version 4.4.1, created on 2024-03-02 22:32:10
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\Notas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e39adad92657_05308774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22d7d379248417715e087e2e7494baf952181c93' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\Notas.tpl',
      1 => 1709415126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e39adad92657_05308774 (Smarty_Internal_Template $_smarty_tpl) {
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
      background-image: url('img/7.jpg');
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
      <select name="materias" id="lang" required>
        <option value="javascript">Spain</option>
        <option value="php">Social studies</option>
        <option value="java">Quimic</option>
        <option value="golang">Fisic</option>
        <option value="python">French</option>
        <option value="c#">English</option>
        <option value="C++">C++</option>
        <option value="erlang">Erlang</option>
        <input type="submit" name="submit" value="Consultar">
      </select>
    </form>
    <br>

    <table border="5">
      <tr>
        <td>Prueba 1</td>
        <td>Prueba 2</td>
        <td>Prueba 3</td>
        <td>Tarea 1</td>
        <td>Tarea 2</td>
        <td>Asistencia</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <div class="Exit">
      <a id="link" href="Alum.tpl">
        <button class="boton">Regresar</button></a>
    </div>
</body>

</html><?php }
}
