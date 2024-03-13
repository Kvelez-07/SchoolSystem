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
    <title>Colaboradores</title>
</head>

<body>
    <h1>Profesores</h1>

    <div class="collaborators_form">
        <form action="index.php" method="POST">
            <input type="number" name="school_levels" min="7" max="11" placeholder="7°-11°">
            <select name="course">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select>
            <input type="submit" name="get_collaborators" value="Profes">
        </form><br><br>
    </div>

    <div class="collaborators_table">
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
                {if isset($collaborators_data)}
                    {foreach from=$collaborators_data item=collaborator}
                        <tr>
                            <td>{$collaborator.username}</td>
                            <td>{$collaborator.email}</td>
                            <td>{$collaborator.first_name}</td>
                            <td>{$collaborator.last_name1}</td>
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