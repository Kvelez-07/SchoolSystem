<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/teacher.css">
    <title>Mis Estudiantes</title>
</head>

<body>
    <h1>Estudiantes</h1><br>

    <div class="students_form">
        <form action="index.php" method="POST">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <select name="course">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="submit" name="get_students" value="Estudiantes">
        </form><br><br>
    </div>

    <div class="students_table">
        <table border="2">
            <thead>
                <tr>
                    <td>User</td>
                    <td>Email</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                </tr>
            </thead>
            <tbody>
                {if isset($students_data)}
                    {foreach from=$students_data item=student}
                        <tr>
                            <td>{$student.username}</td>
                            <td>{$student.email}</td>
                            <td>{$student.first_name}</td>
                            <td>{$student.last_name1}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="4">No subject data available.</td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>

    <div class="Exit1">
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html>