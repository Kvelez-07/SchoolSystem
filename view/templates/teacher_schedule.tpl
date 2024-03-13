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
    <title>Horario Profesor</title>
</head>

<body>
    <h1>Horarios</h1><br>

    <form action="index.php" method="POST">
        <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
        <select name="course">
            <option value="spanish">Español</option>
            <option value="social_studies">Estudios Sociales</option>
            <option value="science">Ciencias</option>
            <option value="math">Mate</option>
        </select>
        <input type="submit" name="teacher_schedule" value="Horario">
    </form><br><br>

    <table border="2">
        <thead>
            <tr>
                <td>Dia</td>
                <td>Empieza</td>
                <td>Termina</td>
            </tr>
        </thead>
        <tbody>
            {if isset($schedule_data)}
                {foreach from=$schedule_data item=schedule}
                    <tr>
                        <td>{$schedule.day}</td>
                        <td>{$schedule.begins}</td>
                        <td>{$schedule.ends}</td>
                    </tr>
                {/foreach}
            {else}
                <tr>
                    <td colspan="4">No subject data available.</td>
                </tr>
            {/if}
        </tbody>
    </table>

    <div class="Exit1">
        <a id="link" href="index.php?action=teachers_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html>