<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/student.css">
    <style>
        body {
            background-image: url('img/subjects.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        form {
            margin: 0 auto;
            width: 400px;
            /* Form schema */
            padding: 1em;
            border: 1px solid ccc;
            border-radius: 1em;
        }
    </style>
</head>

<body>
    <div class="grades_form" id="main-form">
        <form action="index.php" method="POST">
            <h1>Materias</h1>
            <p>Favor seleccionar la asignatura</p>
            <input type="text" name="username" placeholder="User">
            <input type="password" name="password" placeholder="Password">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <select name="course" id="course" required>
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="submit" name="student_grades" value="Notas">
        </form><br><br>
    </div>

    <div class="grades_table">
        <table border="2">
            <thead>
                <tr>
                    <td>Estudiante</td>
                    <td>Username</td>
                    <td>Curso Año:</td>
                    <td>Trimestre</td>
                    <td>Nota</td>
                </tr>
            </thead>
            <tbody>
                {if isset($student_grades)}
                    {foreach from=$student_grades.grades_data item=grades}
                        <tr>
                            <td>{$student_grades.student_full_name}</td>
                            <td>{$student_grades.student_username}</td>
                            <td>{$student_grades.school_level_course}</td>
                            <td>{$grades.trimester}</td>
                            <td>{$grades.grades}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="2">No attendance data available.</td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>

    <div class="Exit1">
        <a id="link" href="index.php?action=students_dashboard">
            <button class="boton">Regresar</button>
        </a>
    </div>
</body>

</html>