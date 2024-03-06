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
	<title>Profesor</title>
	<style>
		body {
			background-image: url('img/teacherBackground.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
</head>

<body>
	<div class="contenedor">
		<div class="contenedor-opciones">

			<div class="card" style="background-image: url('img/2.jpg')">
				<a id="link" href="index.php?action=students_grades">Notas</a>
				<div class="textos">
					<h3></h3>
				</div>
			</div>
			<div class="card" style="background-image: url('img/8.jpg')">

				<a id="link" href="index.php?action=other_teachers">Colaboradores</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/4.jpg')">
				<a id="link" href="index.php?action=teacher_schedule">Horarios</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/6.jpg')">
				<a id="link" href="index.php?action=students_attendance">Asistencia</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>
		</div>

		<div class="card" style="background-image: url('img/students.jpeg')">
			<a id="link" href="index.php?action=my_students">Estudiantes</a>
			<div class="textos">
				<h3></h3>

			</div>
		</div>

		<div class="banner" style="background-image: url('img/banner.jpg')">
			<a id="link" href="index.php?action=logout">
				<button class="boton">Cerrar Sesión</button></a>
		</div>
	</div>
</body>

</html>