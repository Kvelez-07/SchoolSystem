<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher</title>
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
	<h1>Sección de profesores</h1>
	<p> <a href="index.php">Ir a la página principal</a></p>
	<div class="contenedor">
		<div class="contenedor-opciones">

			<div class="card" style="background-image: url('img/2.jpg')">
				<a id="link" href="students_grades.tpl">Notas</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>
			<div class="card" style="background-image: url('img/8.jpg')">

				<a id="link" href="other_teachers.tpl">Profesores</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/4.jpg')">
				<a id="link" href="teacher_schedule.tpl">Horarios</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>

			<div class="card" style="background-image: url('img/6.jpg')">
				<a id="link" href="students_attendance.tpl">Asistencia</a>
				<div class="textos">
					<h3></h3>

				</div>
			</div>
		</div>
		<div class="card" style="background-image: url('img/students.jpeg')">

			<a id="link" href="my_students.tpl">Estudiantes</a>
			<div class="textos">
				<h3></h3>

			</div>
		</div>
	</div>

</body>

</html>