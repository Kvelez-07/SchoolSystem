<?php
/* Smarty version 4.4.1, created on 2024-03-02 21:36:48
  from 'C:\xampp\htdocs\progra\progra\proyecto\view\templates\Alum.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e38de077c189_30373992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '529532ca9242c60cea174a0866fb6f8b7db569cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\progra\\progra\\proyecto\\view\\templates\\Alum.tpl',
      1 => 1709411786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e38de077c189_30373992 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
	<title>Alumno</title>
        <style> body{ background-image:url('img/5.jpg');
                      background-repeat:no-repeat;
                      background-attachment:fixed;                     
                       background-size:cover;}
                          </style>
</head>
<body>
	<div class="contenedor">
		<div class="contenedor-conciertos">
		
			<div class="card" style="background-image: url('img/2.jpg')">
                         <a id="link" href="link/Notas.tpl">Notas</a>
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

		<div class="banner" style="background-image: url('img/banner.jpg')">
			<a id="link" href="index.php">
                         <button class="boton">Cerrar Sesión</button ></a>
                      
		</div>
	</div>
</body>
</html><?php }
}
