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
    <h1>Asistencias</h1><br>

    <form action="index.php" method="POST">
        <select name="subject">
            <!-- materia -->
            <option value="spanish">Español</option>
            <option value="social_studies">Estudios Sociales</option>
            <option value="science">Ciencias</option>
            <option value="math">Mate</option>
        </select>
        <input type="submit" name="student_attendance" value="Asistencia">
    </form><br><br>

    <table border="2">
        <thead>
            <tr>
                <td>Estudiante</td>
                <td>Materia</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                {* <td>{foreach from=$student_attendance item=item key=key name=name}
                    <!-- Controller: $this->view->setAssign->(varaible); -->
                    {/foreach}
                </td> *}
            </tr>
        </tbody>
    </table>

    <div class="Exit1">
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html>