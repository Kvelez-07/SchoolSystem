<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin_login.css">
</head>

<body>
    <div id="main-form">
        <form action="index.php" method="post">
            <!-- Exclusive Login for Admin -->
            <h1>Login</h1>
            <p>Favor rellenar todos los campos</p>
            <input type="hidden" id="admin" name="user_type" value="Admin" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" name="logUser" value="LogIn">
        </form>
    </div>

    <div class="main-page">
        <a href="index.php"><button id="main" name="main">Regresar</button></a>
    </div>
</body>

</html>