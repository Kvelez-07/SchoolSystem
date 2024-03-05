<?php

require_once "connection/database.php"; // updates only with POST not REQUEST

if(isset($_POST['update'])){
    if(!empty($_POST['username']) && !empty($_POST['user_type']) && !empty($_POST['password']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['new_username']) && !empty($_POST['new_user_type']) && !empty($_POST['new_password']) && !empty($_POST['new_first_name']) && !empty($_POST['new_last_name']) && !empty($_POST['new_email']) && !empty($_POST['new_phone'])) {

        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $new_username = filter_var($_POST['new_username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_user_type = filter_var($_POST['new_user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $new_first_name = filter_var($_POST['new_first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_last_name = filter_var($_POST['new_last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_email = filter_var($_POST['new_email'], FILTER_SANITIZE_EMAIL);
        $new_phone = filter_var($_POST['new_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($user_type != "Student" && $user_type != "Teacher") {
            echo "Invalid user type";
            exit;
        }

        // Prepare and execute SELECT query
        $sql_select = "SELECT * FROM users WHERE username = ? AND user_type = ?";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->execute([$username, $user_type]);
        $result = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

        // If user exists, update user information
        if (count($result) > 0) {
            $sql_update = "UPDATE users SET username = ?, user_type = ?, password = ?, email = ?, phone = ?, first_name = ?, last_name = ? WHERE username = ? AND user_type = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->execute([$new_username, $new_user_type, $new_password, $new_email, $new_phone, $new_first_name, $new_last_name, $username, $user_type]);
            echo "User updated.";
        } else {
            echo "User not found.";
        }
        
        // Close connection
        $conn = null;
        $stmt_select = null;
        $stmt_update = null;
    } else {
        echo "All fields are required.";
    }
}

?>

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