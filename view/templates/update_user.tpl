<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/update_user.css">
</head>

<body>
    <header class="update_user_header">
        <h1>Update</h1>
    </header>

    <div class="update_user_form">
        <form action="index.php" method="POST">
            <p>Verification: </p>
            <input type="text" name="username" placeholder="Username">
            <select name="user_type" id="user_type">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>
            <input type="password" name="password" placeholder="Password"><br><br>

            <p>New data (unnecessary updates can be left with previous values):</p>
            <input type="text" name="new_username" placeholder="New Username">
            <input type="password" name="new_password" placeholder="New Password">
            <input type="text" name="new_first_name" placeholder="New First Name">
            <input type="text" name="new_last_name1" placeholder="New Last Name1">
            <input type="text" name="new_last_name2" placeholder="New Last Name2">
            <input type="text" name="new_email" placeholder="New Email">
            <input type="text" name="new_phone" placeholder="New Phone"><br><br>

            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="update_user" value="Update">
        </form>
    </div>

</body>

</html>