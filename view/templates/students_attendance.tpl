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
    <title>Asistencias</title>
</head>

<body>
    <h1>Asignar Asistencias</h1><br>

    <div class="attendance_form">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <label for="justified">Justificacion</label>
            <input type="radio" name="justified" value="Y"> Y
            <input type="radio" name="justified" value="N"> N <br><br>
            <select name="course">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="date" name="date">
            <input type="submit" name="set_student_attendance" value="Asistencia">
        </form><br><br>
    </div>


    <h1>Tomar Asistencias</h1><br>

    <div class="attendance_form">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°"> <br><br>
            <select name="course">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="date" name="date">
            <input type="submit" name="get_student_attendance" value="Asistencia">
        </form><br><br>
    </div>

    <div class="attendance_table">
        <table border="2">
            <thead>
                <tr>
                    <td>Student</td>
                    <td>Username</td>
                    <td>School Level Course:</td>
                    <td>Justificado</td>
                    <td>Fecha</td>
                </tr>
            </thead>
            <tbody>
                {if isset($student_attendance)}
                    {foreach from=$student_attendance.attendance_data item=attendance}
                        <tr>
                            <td>{$student_attendance.student_full_name}</td>
                            <td>{$student_attendance.student_username}</td>
                            <td>{$student_attendance.school_level_course}</td>
                            <td>{$attendance.justified}</td>
                            <td>{$attendance.date}</td>
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
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html>