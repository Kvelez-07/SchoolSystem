<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="css/delete_subject.css">
</head>

<body>
    <header class="delete_subject_header">
        <h1>Subject Deletion</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <input type="number" name="teacher_id" placeholder="teacher_id">
            <input type="number" name="school_levels_id" placeholder="school_levels_id"><br><br>
            <select name="subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="delete_subject" value="Delete">
        </form> <br><br>
    </div>
</body>

</html>