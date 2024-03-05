<?php

require_once "database.php";

if(isset($_POST['create'])) {
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['user_type']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['id_card']) && !empty($_POST['nationality']) && !empty($_POST['birth_date']) && !empty($_POST['blood_type']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
        $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_card = filter_var($_POST['id_card'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nationality = filter_var($_POST['nationality'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $birth_date = filter_var($_POST['birth_date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $blood_type = filter_var($_POST['blood_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $dad_name = filter_var($_POST['dad_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $dad_phone = filter_var($_POST['dad_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mom_name = filter_var($_POST['mom_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mom_phone = filter_var($_POST['mom_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($user_type == "Student") {
            if(empty($dad_name) || empty($dad_phone) || empty($mom_name) || empty($mom_phone)) {
                echo "All fields are required";
                die();
            }
        }

        if($blood_type != "A+" && $blood_type != "A-" && $blood_type != "B+" && $blood_type != "B-" && $blood_type != "AB+" && $blood_type != "AB-" && $blood_type != "O+" && $blood_type != "O-") {
            echo "Invalid blood type";
            die();
        }
    
        $sql = "SELECT * FROM users WHERE first_name = :first_name AND last_name = :last_name AND user_type = :user_type AND username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':user_type', $user_type);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if($user) {
            echo "User already exists";
        } elseif($user_type != "Student" && $user_type != "Teacher") {
            echo "Invalid user type";
        } else {
            $sql = "INSERT INTO users (username, password, user_type, first_name, last_name, id_card, nationality, birth_date, blood_type, address, email, phone, dad_name, dad_phone, mom_name, mom_phone) VALUES (:username, :password, :user_type, :first_name, :last_name, :id_card, :nationality, :birth_date, :blood_type, :address, :email, :phone, :dad_name, :dad_phone, :mom_name, :mom_phone)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':user_type', $user_type);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':id_card', $id_card);
            $stmt->bindParam(':nationality', $nationality);
            $stmt->bindParam(':birth_date', $birth_date);
            $stmt->bindParam(':blood_type', $blood_type);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':dad_name', $dad_name);
            $stmt->bindParam(':dad_phone', $dad_phone);
            $stmt->bindParam(':mom_name', $mom_name);
            $stmt->bindParam(':mom_phone', $mom_phone);
            $stmt->execute();
            echo "User created successfully";
        }
    }
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

    <h1>Create</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h3>User:</h3>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="user_type" id="user_type" required>
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="id_card" placeholder="ID Card" required> <br> <br>
        <input type="text" name="nationality" placeholder="Nationality" required>
        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" required>
        Blood Type:
        <select name="blood_type" id="blood_type" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>

        <h3>Contacts:</h3>
        <p>Dad: </p>
        <input type="text" name="dad_name" placeholder="Dad Name">
        <input type="text" name="dad_phone" placeholder="Dad Phone">
        <p>Mom: </p>
        <input type="text" name="mom_name" placeholder="Mom Name">
        <input type="text" name="mom_phone" placeholder="Mom Phone">
        <input type="submit" name="create" value="Create">
    </form> <br>

    <a href="login.php">Back</a>
</body>
</html>