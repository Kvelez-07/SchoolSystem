<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <h1>Subject Creation</h1>
    <div class="subject_form">
        <form action="index.php" method="POST">
            <input type="hidden" name="subject_action" value="subject_action"> <!-- controller signal -->
            <div class="subject_data">
                <h3>Subject:</h3>
                <select name="subject_name" id="subject_name" required>
                    <option value="spanish">Español</option>
                    <option value="social_studies">Estudios</option>
                    <option value="science">Ciencias</option>
                    <option value="math">Mate</option>
                </select>
            </div> <!-- actions to save some code and views -->
            <input type="submit" name="create_subject" value="Create Subject">
            <input type="submit" name="read_subject" value="Read Subject">
            <input type="submit" name="update_subject" value="Update Subject">
            <input type="submit" name="delete_subject" value="Delete Subject">
        </form> <br>
    </div>

    <div class="exit_button">
        <a href="index.php?action=admin_dashboard"><button>Back</button></a>
    </div>
</body>

</html>