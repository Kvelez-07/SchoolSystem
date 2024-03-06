<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/student.css">
  <title>Notas</title>

  <style>
    body {
      background-image: url('img/7.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    form {
      margin: 0 auto;
      width: 400px;
      /* Esquema del formulario */
      padding: 1em;
      border: 1px solid ccc;
      border-radius: 1em;
    }
  </style>
</head>

<body>
  <div id="main-form">
    <form>
      <h1>Materias</h1>
      <p>Favor seleccionar la asignatura</p>
      <select name="materias" id="lang" required>
        <option value="javascript">Spanish</option>
        <option value="php">Social Studies</option>
        <option value="java">Chemistry</option>
        <option value="golang">PHysics</option>
        <option value="python">French</option>
        <option value="c#">English</option>
        <option value="C++">C++</option>
        <option value="erlang">Erlang</option>
        <input type="submit" name="submit" value="Consultar">
      </select>
    </form>
    <br>

    <table border="5">
      <tr>
        <td>Prueba 1</td>
        <td>Prueba 2</td>
        <td>Prueba 3</td>
        <td>Tarea 1</td>
        <td>Tarea 2</td>
        <td>Asistencia</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <div class="Exit">
      <a id="link" href="students_dashboard.tpl">
        <button class="boton">Regresar</button></a>
    </div>
</body>

</html>