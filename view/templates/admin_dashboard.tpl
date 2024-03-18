<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>

<body>
    <header class="dashboard_header">
        <h1>Admin</h1>
        <p>Admin section or go <a href="index.php">back</a></p>
    </header>

    <div class="user_manipulation">
        <h2>User</h2>
        <a href="index.php?action=signup">Create</a> <!-- SignUp User -->
        <a href="index.php?action=read_user">Read</a>
        <a href="index.php?action=update_user">Update</a>
        <a href="index.php?action=delete_user">Delete</a>
    </div>

    <div class="subject_manipulation">
        <!-- Generate Subjects based on DB tables and FKs -->
        <h2>Subjects</h2>
        <a href="index.php?action=create_subject">Create</a>
        <a href="index.php?action=read_subject">Read</a>
        <a href="index.php?action=update_subject">Update</a>
        <a href="index.php?action=delete_subject">Delete</a>
    </div>
</body>

</html>