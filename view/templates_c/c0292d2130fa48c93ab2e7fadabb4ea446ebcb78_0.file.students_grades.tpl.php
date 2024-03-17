<?php
/* Smarty version 4.4.1, created on 2024-03-17 04:36:26
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\students_grades.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f6653a7b9527_21357271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0292d2130fa48c93ab2e7fadabb4ea446ebcb78' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\students_grades.tpl',
      1 => 1710646574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f6653a7b9527_21357271 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/student.css">
    <style>
        body {
            background-image: url('img/subjects.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        form {
            margin: 0 auto;
            width: 400px;
            /* Form schema */
            padding: 1em;
            border: 1px solid ccc;
            border-radius: 1em;
        }
    </style>
</head>

<body>
    <div class="set_grades_form" id="main-form">
        <form action="index.php" method="POST">
            <h1>Materias</h1>
            <p>Asinar notas</p>
            <input type="text" name="username" placeholder="User">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <input type="number" name="trimester" min="1" max="3" placeholder="3mestre">
            <input type="number" name="grades" min="1" max="100" placeholder="Nota">
            <select name="course" id="course" required>
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="submit" name="set_student_grades" value="Nota">
        </form><br><br>
    </div>

    <div class="grades_form" id="main-form">
        <form action="index.php" method="POST">
            <h1>Materias</h1>
            <p>Obtener notas</p>
            <input type="text" name="username" placeholder="User">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <select name="course" id="course" required>
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="submit" name="student_grades" value="Notas">
        </form><br><br>
    </div>

    <div class="grades_table">
        <table border="2">
            <thead>
                <tr>
                    <td>Estudiante</td>
                    <td>Username</td>
                    <td>Curso Año:</td>
                    <td>Trimestre</td>
                    <td>Nota</td>
                </tr>
            </thead>
            <tbody>
                <?php if ((isset($_smarty_tpl->tpl_vars['student_grades']->value))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student_grades']->value['grades_data'], 'grades');
$_smarty_tpl->tpl_vars['grades']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['grades']->value) {
$_smarty_tpl->tpl_vars['grades']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['student_grades']->value['student_full_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['student_grades']->value['student_username'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['student_grades']->value['school_level_course'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['grades']->value['trimester'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['grades']->value['grades'];?>
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
            <button class="boton">Regresar</button>
        </a>
    </div>
</body>

</html><?php }
}
