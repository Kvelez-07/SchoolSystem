<?php
/* Smarty version 4.4.1, created on 2024-03-04 14:53:26
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\Estudiantes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e5d2567d01b6_96966114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2af1b1b27f09151cc805f7d3e9d4a61b744a4fcc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\Estudiantes.tpl',
      1 => 1709560251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e5d2567d01b6_96966114 (Smarty_Internal_Template $_smarty_tpl) {
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
	<form action="index.php" method="post">
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
		<a id="link" href="Alum.tpl"><button class="boton">Regresar</button ></a>
		</div>
	</form>
</body>
</html><?php }
}
