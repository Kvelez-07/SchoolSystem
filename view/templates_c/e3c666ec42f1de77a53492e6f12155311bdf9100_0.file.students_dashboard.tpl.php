<?php
/* Smarty version 4.4.1, created on 2024-03-18 18:21:05
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\students_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f87801574826_18825422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3c666ec42f1de77a53492e6f12155311bdf9100' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\students_dashboard.tpl',
      1 => 1710737615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f87801574826_18825422 (Smarty_Internal_Template $_smarty_tpl) {
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
	<title>Alumno</title>
	<style>
		body {
			background-image: url('img/studentBackground.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
</head>

<body>
	<div class="contenedor">
		<div class="contenedor-opciones">
			<!-- Views with GET action redirection -->

			<div class="card" style="background-image: url('img/grades.jpg')">
				<a id="link" href="index.php?action=my_grades">Notas</a>
				<div class="textos">
					<h3></h3>
				</div>
			</div>
			<div class="card" style="background-image: url('img/classroom.jpg')">

				<a id="link" href="index.php?action=my_teachers">Profesores</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/schedule.jpg')">
				<a id="link" href="index.php?action=my_schedule">Horarios</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/attendance.jpg')">
				<a id="link" href="index.php?action=my_attendance">Asistencia</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>
		</div>

		<div class="card" style="background-image: url('img/students.jpeg')">
			<a id="link" href="index.php?action=my_classmates">Compañeros</a>
			<div class="textos">
				<h3></h3>

			</div>
		</div>

		<div class="banner" style="background-image: url('img/banner.jpg')">
			<a id="link" href="index.php?action=logout">
				<button class="boton">Cerrar Sesión</button></a>
		</div>
	</div>
</body>

</html><?php }
}
