<?php
/* Smarty version 4.4.1, created on 2024-03-18 19:54:04
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\create_subject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f88dcc6b16f1_01048692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94d5f2a77405f1402da50ee25859a39520a5a515' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\create_subject.tpl',
      1 => 1710736989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f88dcc6b16f1_01048692 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="css/create_subject.css">
</head>

<body>
    <header class="create_subject_header">
        <h1>Subject Creation</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <label for="begins">Begin: </label> <!-- for the schedule DB table -->
            <select name="begins">
                <option value="7am">7am</option>
                <option value="9am">9am</option>
                <option value="10am">10am</option>
                <option value="2pm">2pm</option>
                <option value="3pm">3pm</option>
                <option value="4pm">4pm</option>
                <option value="5pm">5pm</option>
                <option value="6pm">6pm</option>
            </select>
            <label for="ends">End: </label> <!-- for the schedule DB table -->
            <select name="ends">
                <option value="10am">10am</option>
                <option value="12pm">12pm</option>
                <option value="3pm">3pm</option>
                <option value="4pm">4pm</option>
                <option value="5pm">5pm</option>
                <option value="7pm">7pm</option>
                <option value="8pm">8pm</option>
                <option value="9pm">9pm</option>
            </select><br><br><br>
            <select name="subject_name">
                <h3>Subject:</h3>
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <label for="ends">Day: </label>
            <select name="day">
                <option value="L">L</option>
                <option value="K">K</option>
                <option value="M">M</option>
                <option value="J">J</option>
                <option value="V">V</option>
            </select><br><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="create_subject" value="Create">
        </form> <br>
    </div>
</body>

</html><?php }
}
