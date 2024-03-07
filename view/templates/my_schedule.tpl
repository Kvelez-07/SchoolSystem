<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/student.css">
    <title>Horarios</title>
</head>

<body>
    <h1>Horario Estudiantil</h1>

    <form action="index.php" method="POST">
        <select name="subject">
            <!-- materia -->
            <option value="javascript">JS</option>
            <option value="php">PHP</option>
            <option value="java">Java</option>
            <option value="golang">Golang</option>
            <option value="python">Python</option>
            <option value="css">CSS</option>
            <option value="c++">C++</option>
            <option value="erlang">Erlang</option>
        </select>
        <input type="submit" name="get_schedule" value="Horario">
    </form>

    <table border="2">
        <thead>
            <tr>
                <td>Materia</td>
                <td>Duracion</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="Exit1">
        <a id="link" href="index.php?action=students_dashboard">
            <button class="boton">Regresar</button></a>
    </div>
</body>

</html>