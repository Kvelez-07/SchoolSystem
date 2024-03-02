<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/singup.css">
</head>

<body>
    <div id="main-form">
        <form action="controller/signup.php" method="post">
            <h1>Registro</h1>
            <p>Favor de rellenar todos los campos</p>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <select name="user_type" id="user_type" name="user_type" title="user_type" required>
                <option value="Student">Alumno</option>
                <option value="Teacher">Profesor</option>
            </select>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>

    <div class="main-page">
        <button type="submit" id="back" name="back" onclick="window.location.href='index.php'">Back</button>
    </div>
</body>

</html>