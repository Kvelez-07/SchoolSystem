<?php
/* Smarty version 4.4.1, created on 2024-03-13 22:48:11
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_classmates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f21f1b904759_12716803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be38087e59e13020b59b2359a7650fafc756526e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_classmates.tpl',
      1 => 1710364008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f21f1b904759_12716803 (Smarty_Internal_Template $_smarty_tpl) {
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
	<title>Compañeros</title>
</head>

<body>
	<h1>Mis Compañeros</h1><br>

	<div class="classmates_form">
		<form action="index.php" method="POST">
			<input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
			<select name="course">
				<option value="spanish">Español</option>
				<option value="social_studies">Estudios Sociales</option>
				<option value="science">Ciencias</option>
				<option value="math">Mate</option>
			</select>
			<input type="submit" name="get_classmates" value="Compañeros">
		</form><br><br>
	</div>

	<div class="classmates_table">
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
				<?php if ((isset($_smarty_tpl->tpl_vars['classmates_data']->value))) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['classmates_data']->value, 'classmate');
$_smarty_tpl->tpl_vars['classmate']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['classmate']->value) {
$_smarty_tpl->tpl_vars['classmate']->do_else = false;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['classmate']->value['username'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['classmate']->value['email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['classmate']->value['first_name'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['classmate']->value['last_name1'];?>
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
