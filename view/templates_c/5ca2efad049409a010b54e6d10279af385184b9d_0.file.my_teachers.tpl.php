<?php
/* Smarty version 4.4.1, created on 2024-03-13 22:47:52
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_teachers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f21f088d4681_55885809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ca2efad049409a010b54e6d10279af385184b9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_teachers.tpl',
      1 => 1710365948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f21f088d4681_55885809 (Smarty_Internal_Template $_smarty_tpl) {
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

	<div class="teachers_form">
		<form action="index.php" method="POST">
			<input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
			<select name="course">
				<option value="spanish">Español</option>
				<option value="social_studies">Estudios Sociales</option>
				<option value="science">Ciencias</option>
				<option value="math">Mate</option>
			</select>
			<input type="submit" name="get_teachers" value="Profes">
		</form><br><br>
	</div>

	<div class="teachers_table">
		<table border="2">
			<thead>
				<tr>
					<td>User</td>
					<td>Email</td>
					<td>Nombre</td>
					<td>Apellido</td>
				</tr>
			</thead>
			<tbody>
				<?php if ((isset($_smarty_tpl->tpl_vars['teachers_data']->value))) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['teachers_data']->value, 'teacher');
$_smarty_tpl->tpl_vars['teacher']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->do_else = false;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['username'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['first_name'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value['last_name1'];?>
</td>
						</tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php } else { ?>
					<tr>
						<td colspan="4">No subject data available.</td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

	<div class="Exit1">
		<a id="link" href="index.php?action=students_dashboard">
			<button class="boton">Regresar</button></a>
	</div>
</body>

</html><?php }
}
