<?php
/* Smarty version 4.4.1, created on 2024-03-07 06:57:42
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_teachers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e95756cc3592_35370457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ca2efad049409a010b54e6d10279af385184b9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_teachers.tpl',
      1 => 1709791053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e95756cc3592_35370457 (Smarty_Internal_Template $_smarty_tpl) {
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
	<title>Mis Profes</title>
	<style>
		body {
			background-image: url('img/8.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
</head>

<body>
	<h1>Profesores</h1>

	<form action="index.php" method="POST">
		<select name="subject">
			<!-- materia -->
			<option value="javascript">JS</option>
			<option value="php">PHP</option>
			<option value="java">Java</option>
			<option value="golang">Golang</option>
			<option value="python">Python</option>
			<option value="css">CSS</option>
			<option value="c++">C++</option>
			<option value="erlang">Erlang</option>
		</select>
		<input type="submit" name="get_teachers" value="Profesor">
	</form>

	<table border="5">
		<thead>
			<tr>
				<td>NombreProfesor</td>
				<td>Materia</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
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