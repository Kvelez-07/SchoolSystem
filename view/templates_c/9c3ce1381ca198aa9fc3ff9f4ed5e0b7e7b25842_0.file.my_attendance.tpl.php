<?php
/* Smarty version 4.4.1, created on 2024-03-18 00:29:07
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_attendance.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f77cc3c6ea01_45435365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c3ce1381ca198aa9fc3ff9f4ed5e0b7e7b25842' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_attendance.tpl',
      1 => 1710718145,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f77cc3c6ea01_45435365 (Smarty_Internal_Template $_smarty_tpl) {
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
	<link rel="stylesheet" href="css/my_attendance.css">
	<title>Asistencia</title>
</head>

<body>
	<header class="attendance_header">
		<h1>Mi Asistencia</h1><br>
	</header>

	<div class="attendance_form">
		<form action="index.php" method="POST">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°"> <br><br>
			<select name="course">
				<option value="spanish">Español</option>
				<option value="social_studies">Estudios Sociales</option>
				<option value="science">Ciencias</option>
				<option value="math">Mate</option>
			</select>
			<input type="date" name="date">
			<input type="submit" name="get_attendance" value="Asistencia">
		</form><br><br>
	</div>

	<div class="attendance_table">
		<table border="2">
			<thead>
				<tr>
					<td>Estudiante</td>
					<td>Username</td>
					<td>Curso Año:</td>
					<td>Justificado</td>
					<td>Fecha</td>
				</tr>
			</thead>
			<tbody>
				<?php if ((isset($_smarty_tpl->tpl_vars['student_attendance']->value))) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student_attendance']->value['attendance_data'], 'attendance');
$_smarty_tpl->tpl_vars['attendance']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attendance']->value) {
$_smarty_tpl->tpl_vars['attendance']->do_else = false;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['student_attendance']->value['student_full_name'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['student_attendance']->value['student_username'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['student_attendance']->value['school_level_course'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['attendance']->value['justified'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['attendance']->value['date'];?>
</td>
						</tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php } else { ?>
					<tr>
						<td colspan="5">No attendance data available.</td>
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
