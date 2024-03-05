<?php

require_once "database.php";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Sanitize input
    $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_type = filter_var($user_type, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Prepare and execute SELECT query
    $sql = "SELECT * FROM users WHERE username = :username AND user_type = :user_type";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':user_type', $user_type);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password and user existence
    if($user && password_verify($password, $user['password'])) {
        // Redirect based on user type
        if($user_type == "Student") {
            echo "Login successful!";
            // header("Location: student_dashboard.php");
            // exit;
        } elseif($user_type == "Teacher") {
            echo "Login successful!";
            // header("Location: teacher_dashboard.php");
            // exit;
        }
    } else {
        echo "Invalid username, password, or user type.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <select name="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="submit" name="login" value="Login">
    </form> <br>

    <table>
        <thead>
            <tr>
                <th>Create</th>
                <th>Read</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td><a href="createUser.php">Create</a></td> 
                <td><a href="readUser.php">Read</a></td>
                <td><a href="updateUser.php">Update</a></td>
                <td><a href="deleteUser.php">Delete</a></td>
            </tr>
        </thead>
    </table>
</body>
</html>