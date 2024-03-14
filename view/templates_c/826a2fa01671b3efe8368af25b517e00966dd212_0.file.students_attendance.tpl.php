<?php
/* Smarty version 4.4.1, created on 2024-03-14 19:41:37
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\students_attendance.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f344e189da46_34397522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '826a2fa01671b3efe8368af25b517e00966dd212' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\students_attendance.tpl',
      1 => 1710441674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f344e189da46_34397522 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/teacher.css">
    <title>Asistencias</title>
</head>

<body>
    <h1>Asistencias</h1><br>

    <div class="attendance_form">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <select name="course">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="date" name="date">
            <input type="submit" name="teacher_attendance" value="Asistencia">
        </form><br><br>
    </div>

    <div class="attendance_table">
        <table border="2">
            <thead>
                <tr>
                    <td>Student</td>
                    <td>Username</td>
                    <td>School Level Course:</td>
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
                        <td colspan="2">No attendance data available.</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <div class="Exit1">
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html><?php }
}
