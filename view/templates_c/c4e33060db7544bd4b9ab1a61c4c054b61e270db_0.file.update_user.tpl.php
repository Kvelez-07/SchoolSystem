<?php
/* Smarty version 4.4.1, created on 2024-03-09 21:57:26
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\update_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65eccd36d68911_83910511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4e33060db7544bd4b9ab1a61c4c054b61e270db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\update_user.tpl',
      1 => 1710017818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65eccd36d68911_83910511 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <h1>Update</h1>

    <form action="<?php echo '<?php'; ?>
 echo $_SERVER['PHP_SELF']; <?php echo '?>'; ?>
" method="POST">
        <p>Past data: (double check values before updating)</p>
        <input type="text" name="username" placeholder="Old Username">
        <select name="user_type" id="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="password" name="password" placeholder="Old Password">
        <input type="text" name="first_name" placeholder="Old First Name">
        <input type="text" name="last_name" placeholder="Old Last Name">
        <input type="text" name="email" placeholder="Old Email">
        <input type="text" name="phone" placeholder="Old Phone"><br><br>
        <p>New data (unnecessary updates can be left with previous values):</p>
        <input type="text" name="new_username" placeholder="New Username">
        <select name="new_user_type" id="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="password" name="new_password" placeholder="New Password">
        <input type="text" name="new_first_name" placeholder="New First Name">
        <input type="text" name="new_last_name" placeholder="New Last Name">
        <input type="text" name="new_email" placeholder="New Email">
        <input type="text" name="new_phone" placeholder="New Phone"><br><br>
        <a href="index.php?action=admin_dashboard">Back</a> or
        <input type="submit" name="update_user" value="Update">
    </form>

</body>

</html><?php }
}
