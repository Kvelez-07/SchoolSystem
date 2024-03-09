<?php
/* Smarty version 4.4.1, created on 2024-03-09 02:29:39
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\students_grades.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65ebbb8342a627_90823373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0292d2130fa48c93ab2e7fadabb4ea446ebcb78' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\students_grades.tpl',
      1 => 1709826413,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ebbb8342a627_90823373 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Notas</title>
</head>

<body>
    <h1>Notas de los Estudiantes</h1>

    <form action="index.php" method="POST">
        <select name="subject">
            <!-- materia -->
            <option value="javascript">JS</option>
            <option value="php">PHP</option>
            <option value="java">Java</option>
            <option value="golang">Golang</option>
            <option value="python">Python</option>
            <option value="css">CSS</option>
            <option value="c++">C++</option>
            <option value="erlang">Erlang</option>
        </select>
        <input type="submit" name="student_grades" value="Notas">
    </form>

    <table border="2">
        <thead>
            <tr>
                <td>Estudinte</td>
                <td>Materia</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student_grades']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <!-- Controller: $this->view->setAssign->(varaible); -->
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="Exit1">
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html><?php }
}
