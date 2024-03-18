<!DOCTYPE html>
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

</html>