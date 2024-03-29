<?php
/* Smarty version 4.4.1, created on 2024-03-04 15:29:28
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\teacher.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e5dac82ed475_92209720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '555d026efb1bd8ca54dbf57bc35ea14d28f20ef8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\teacher.tpl',
      1 => 1709562565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e5dac82ed475_92209720 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/teacher.css">
	<title>Profesor</title>
	<style>
		body {
			background-image: url('img/teacherBackground.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
</head>

<body>
	<h1>Sección de profesores</h1>
	<p> <a href="index.php">Ir a la página principal</a></p>
	<div class="contenedor">
		<div class="contenedor-opciones">

			<div class="card" style="background-image: url('img/2.jpg')">
				<a id="link" href="Notas.tpl">Notas</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>
			<div class="card" style="background-image: url('img/8.jpg')">

				<a id="link" href="Profesores.tpl">Profesores</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/4.jpg')">
				<a id="link" href="Horario.tpl">Horarios</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/6.jpg')">
				<a id="link" href="Asistencia.tpl">Asistencia</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>
		</div>
		<div class="card" style="background-image: url('img/students.jpeg')">

			<a id="link" href="Estudiantes.tpl">Estudiantes</a>
			<div class="textos">
				<h3></h3>

			</div>
		</div>
	</div>

</body>

</html><?php }
}
