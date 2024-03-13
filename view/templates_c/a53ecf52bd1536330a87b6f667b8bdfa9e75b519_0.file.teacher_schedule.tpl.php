<?php
/* Smarty version 4.4.1, created on 2024-03-14 00:43:44
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\teacher_schedule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f23a30586759_69805245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a53ecf52bd1536330a87b6f667b8bdfa9e75b519' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\teacher_schedule.tpl',
      1 => 1710373255,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f23a30586759_69805245 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Horario Profesor</title>
</head>

<body>
    <h1>Horarios</h1><br>

    <form action="index.php" method="POST">
        <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
        <select name="course">
            <option value="spanish">Español</option>
            <option value="social_studies">Estudios Sociales</option>
            <option value="science">Ciencias</option>
            <option value="math">Mate</option>
        </select>
        <input type="submit" name="teacher_schedule" value="Horario">
    </form><br><br>

    <table border="2">
        <thead>
            <tr>
                <td>Dia</td>
                <td>Empieza</td>
                <td>Termina</td>
            </tr>
        </thead>
        <tbody>
            <?php if ((isset($_smarty_tpl->tpl_vars['schedule_data']->value))) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['schedule_data']->value, 'schedule');
$_smarty_tpl->tpl_vars['schedule']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['day'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['begins'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['schedule']->value['ends'];?>
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

    <div class="Exit1">
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html><?php }
}
