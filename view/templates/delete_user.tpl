<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="css/delete_user.css">
</head>

<body>

    <header class="delete_user_header">
        <h1>Delete</h1>
    </header>

    <div class="delete_user_form">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <select name="user_type" id="user_type">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name1" placeholder="Last Name1">
            <input type="text" name="last_name2" placeholder="Last Name2"><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="delete_user" value="Delete">
        </form>
    </div>
</body>

</html>