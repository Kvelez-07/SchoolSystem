<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Delete</h1>

    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <select name="user_type" id="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name">
        <input type="submit" name="delete" value="Delete">
    </form> <br>

    <a href="login.php">Back</a>
</body>
</html>