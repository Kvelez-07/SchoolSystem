<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Update</h1>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
        <a href="login.php">Back</a> or
        <input type="submit" name="update" value="Update">
    </form>

</body>
</html>