<?php
/* Smarty version 4.4.1, created on 2024-03-13 18:58:40
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\read_subject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f1e950cd78f3_24999973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5c9f6bb9d56b145c32008961ab2ffc1a72e6d30' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\read_subject.tpl',
      1 => 1710352716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f1e950cd78f3_24999973 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>

<body>
    <header class="read_user_header">
        <h1>Subject List</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <select name="subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="read_subject" value="Read">
        </form> <br><br>
    </div>

    <div class="read_subject_table">
        <table>
            <thead>
                <tr>
                    <td>Subject ID</td>
                    <td>School-Level ID</td>
                    <td>Teacher ID</td>
                    <td>Subject Name</td>
                </tr>
            </thead>
            <tbody>
                <?php if ((isset($_smarty_tpl->tpl_vars['subject_data']->value))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subject_data']->value, 'subject');
$_smarty_tpl->tpl_vars['subject']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['subject']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['subject']->value['school_levels_id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['subject']->value['teacher_id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['subject']->value['subject_name'];?>
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
</body>

</html><?php }
}
