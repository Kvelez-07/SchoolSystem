<?php
/* Smarty version 4.4.1, created on 2024-03-13 01:32:35
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\read_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f0f423310f49_06970868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3984f99cd3459eebf2ccd85306e0b37797a5cfe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\read_user.tpl',
      1 => 1710289950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f0f423310f49_06970868 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="css/read_user.css">
</head>

<body>
    <header class="read_user_header">
        <h1>Read</h1>
    </header>

    <div class="read_user_form">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <select name="user_type">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name1" placeholder="Last Name1"><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="read_user" value="Read">
        </form> <br><br>
    </div>

    <div class="read_user_table">
        <table>
            <thead>
                <tr>
                    <td>User</td>
                    <td>Email</td>
                    <td>First Name</td>
                    <td>Last Name1</td>
                </tr>
            </thead>
            <tbody>
                <?php if ((isset($_smarty_tpl->tpl_vars['user_data']->value))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_data']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['last_name1'];?>
</td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4">No user data available.</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>

</html><?php }
}
