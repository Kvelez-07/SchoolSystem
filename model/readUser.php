<?php

require_once "connection/database.php";

if(isset($_REQUEST['read'])) {
    $username = $_REQUEST['username'];
    $user_type = $_REQUEST['user_type'];
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];

    $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_type = filter_var($user_type, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $first_name = filter_var($first_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $last_name = filter_var($last_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(empty($username) && empty($user_type) && empty($first_name) && empty($last_name)) {
        echo "All fields are required";
        exit;
    }

    if($user_type != "Student" && $user_type != "Teacher") {
        echo "Invalid user type";
        exit;
    }
    
    $sql = "SELECT * FROM users WHERE username = ? AND user_type = ? AND first_name = ? AND last_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $user_type, $first_name, $last_name]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(empty($result)) {
        echo "User not found";
        exit;
    }

} else {
    echo "User not found";
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
    <h1>Read</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="username" placeholder="Username">
        <select name="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name">
        <input type="submit" name="read" value="Read">
    </form>

    <?php if(isset($result)): ?>
        <h3>Users Table</h3>
        <table>
            <tr>
                <th>Username</th>
                <th>User Type</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            <?php foreach($result as $row): ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['user_type']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?> <br>

    <?php if(isset($result)): ?>
        <h3>Users List</h3>
        <ul>
            <?php foreach($result as $row): ?>
                <li>Username: <?php echo $row['username']; ?></li>
                <li>User Type: <?php echo $row['user_type']; ?></li>
                <li>First Name: <?php echo $row['first_name']; ?></li>
                <li>Last Name: <?php echo $row['last_name']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?></ul>

    <a href="login.php">Back</a>
</body>
</html>