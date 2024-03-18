<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/update_subject.css">
</head>

<body>
    <header class="update_subject_header">
        <h1>Subject Update</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <!-- base on DB tables -->
            <input type="number" name="teacher_id" placeholder="teacher_id">
            <input type="number" name="school_levels_id" placeholder="school_levels_id"><br><br>
            <select name="subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>

            <input type="number" name="new_teacher_id" placeholder="new_teacher_id">
            <input type="number" name="new_school_levels_id" placeholder="new_school_levels_id"><br><br>
            <select name="new_subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="update_subject" value="Update">
        </form><br><br>
    </div>
</body>

</html>