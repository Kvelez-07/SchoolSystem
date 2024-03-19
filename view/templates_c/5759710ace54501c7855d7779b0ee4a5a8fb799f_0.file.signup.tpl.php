<?php
/* Smarty version 4.4.1, created on 2024-03-19 05:24:33
  from 'C:\xampp\htdocs\code\SchoolSystem\view\templates\signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65f9138193e247_82259501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5759710ace54501c7855d7779b0ee4a5a8fb799f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\code\\SchoolSystem\\view\\templates\\signup.tpl',
      1 => 1710785663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f9138193e247_82259501 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singup</title>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>

    <header class="signup_header">
        <h1>MATRICULA SAINCTI SPIRITUS</h1>
    </header>

    <div class="signup_form">
        <form action="index.php" method="POST">
            <div class="personal_data">
                <h3>Usuario:</h3>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <label for="specialty">Materia:</label>
                <select name="specialty" id="specialty" required>
                    <option value="spanish">Español</option>
                    <option value="social_studies">Estudios</option>
                    <option value="science">Ciencias</option>
                    <option value="math">Mate</option>
                </select>
                <label for="user_type">Usuario:</label>
                <select name="user_type" id="user_type" required>
                    <option value="Student">Estudiante</option>
                    <option value="Teacher">Profesor</option>
                </select> <br> <br>
                <input type="number" name="school_levels" min="7" max="11" placeholder="Grados/Nivel 7°-11°">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name1" placeholder="Last Name1" required>
                <input type="text" name="last_name2" placeholder="Last Name2" required>
                <input type="text" name="id_card" placeholder="ID Card" required>
                <input type="text" name="nationality" placeholder="Nationality" required>
                <label for="birth">Nacimiento:</label> <br><br>
                <input type="date" name="birth" required>
                <label for="blood">Tipo de Sangre:</label>
                <select name="blood" id="blood" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select> <br><br>
                <input type="text" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="text" name="address" placeholder="Address" required>
            </div>

            <!-- only for students and parent table in DB -->
            <div class="contact_data">
                <h3>Contactos:</h3>
                <p>Contacto 1: </p>
                <input type="text" name="contact1_name" placeholder="Full Name">
                <input type="text" name="contact1_phone" placeholder="Phone">
                <p>Contacto 2: </p>
                <input type="text" name="contact2_name" placeholder="Full Name">
                <input type="text" name="contact2_phone" placeholder="Phone">
                <input type="submit" name="signup" value="Signup">
            </div>

        </form> <br>
    </div>

    <div class="exit_button">
        <a href="index.php?action=admin_dashboard"><button>Back</button></a>
    </div>
</body>

</html><?php }
}
