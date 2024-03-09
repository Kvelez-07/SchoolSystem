<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <select name="user_type" id="user_type" required>
                    <option value="Student">Estudiante</option>
                    <option value="Teacher">Profe</option>
                </select> <br> <br>
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="text" name="id_card" placeholder="ID Card" required>
                <input type="text" name="nationality" placeholder="Nationality" required>
                <label for="birth_date">Nacimiento:</label> <br><br>
                <input type="date" name="birth_date" required>
                <label for="blood_type">Tipo de Sangre:</label>
                <select name="blood_type" id="blood_type" required>
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

            <div class="contact_data">
                <h3>Contactos:</h3>
                <p>Papa: </p>
                <input type="text" name="dad_name" placeholder="Dad Name">
                <input type="text" name="dad_phone" placeholder="Dad Phone">
                <p>Mama: </p>
                <input type="text" name="mom_name" placeholder="Mom Name">
                <input type="text" name="mom_phone" placeholder="Mom Phone">
                <input type="submit" name="signup" value="signup">
            </div>
        </form> <br>
    </div>

    <div class="exit_button">
        <a href="index.php?action=logout"><button>Back</button></a>
    </div>
</body>

</html>