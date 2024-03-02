<?php
/* Smarty version 4.4.1, created on 2024-03-02 22:36:17
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\Profesores.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e39bd15c70d0_34306685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d462a840cfd31355427f08d7b0b7b3330b40c98' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\Profesores.tpl',
      1 => 1709415373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e39bd15c70d0_34306685 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="ccs/student.css">
	<title>Profesores</title>
        <style= background:white>
    <style> body{ background-image:url('img/8.jpg');
                  background-repeat:no-repeat;
                  background-attachment:fixed;                     
                  background-size:cover;}
    </style>
</head>

<body>            					
<form>
<table border="1">
<tr>
<td>Nombre del Profesor</td>
<td>Materia que imparte</td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
</table>
<div class="Exit1">
<a id="link" href="Alum.tpl">
  <button class="boton">Regresar</button ></a>
</div>
  <button type="submit" id="back" name="back" onclick="window.location.href='index.php'">Back</button>
</form>
</body>
</html><?php }
}
