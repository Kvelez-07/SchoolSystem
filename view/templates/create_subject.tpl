<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="css/create_subject.css">
</head>

<body>
    <header class="create_subject_header">
        <h1>Subject Creation</h1>
    </header>

    <div class="subject_form">
        <form action="index.php" method="POST">
            <select name="subject_name">
                <h3>Subject:</h3>
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="create_subject" value="Create">
        </form> <br><br>
    </div>
</body>

</html>