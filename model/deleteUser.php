<?php

require_once "connection/database.php";

if(isset($_REQUEST['delete'])) {
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $user_type = filter_var($_REQUEST['user_type'], FILTER_SANITIZE_SPECIAL_CHARS);
    $first_name = filter_var($_REQUEST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_var($_REQUEST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username) || empty($user_type) || empty($first_name) || empty($last_name)) {
        echo "Please fill in all fields";
        exit;
    }

    if($user_type != "Student" && $user_type != "Teacher") {
        echo "Invalid user type";
        exit;
    }

    $sql = "DELETE FROM users WHERE username = ? AND user_type = ? AND first_name = ? AND last_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $user_type, $first_name, $last_name]);
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$user) {
        echo "User not found";
    } else {
        echo "User deleted successfully";
    }
    
    $stmt = null;
    $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Delete</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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