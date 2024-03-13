<?php
/* Smarty version 4.4.1, created on 2024-03-13 23:24:05
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\my_students.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f227851cd6a7_55670445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09a15376e54122a99c0daf5ce0385713004e943f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\my_students.tpl',
      1 => 1710368637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f227851cd6a7_55670445 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Mis Estudiantes</title>
</head>

<body>
    <h1>Estudiantes</h1><br>

    <div class="students_form">
        <form action="index.php" method="POST">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <select name="course">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="submit" name="get_students" value="Estudiantes">
        </form><br><br>
    </div>

    <div class="students_table">
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
                <?php if ((isset($_smarty_tpl->tpl_vars['students_data']->value))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['students_data']->value, 'student');
$_smarty_tpl->tpl_vars['student']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['username'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['first_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['last_name1'];?>
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
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html><?php }
}
