
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no ,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/textoIntro.css">

	<title>Inicio</title>
</head>
<body>
	<header><h1>Hospital DR. Ricardo Gutierrez</h1></header>
	<nav class="menu">
		<ul>
			<li><a href="./primeraEntrega/iniciarSession.php">Iniciar Sesion</a></li>
			<li><a href="./primeraEntrega/registrarse.php">Registrarse</a></li>

		<li>
		<form id="searchform" action="primeraEntrega/busquedaPaciente.php">
			<input type="text" placeholder="Buscar..."/>
			<button>Ir</button>
		</form>
		</li>
		</ul>
	</nav>
	<div class="botonResponsive">
		<form id="searchformResponsive" action="primeraEntrega/busquedaPaciente.php">
			<input type="text" placeholder="Buscar..."/>
			<button>Ir</button>
		</form>
	</div>
	<br><br><br><br>
	<table class="contenido">
	<tr>
	<th>
			 El Hospital
	</th>
	<th>
			Guardia
	</th>
	<th>
			Especialidades
	</th>
	</tr>
		<tr>
	<td>
		<form action="pagina1.php" method="post">
			<div class="textoIntro">
			Este centro de salud tiene un programa de residencia de primer nivel en el pais. Se ofrecen oportunidades de practica intensiva y supervisada en ambitos profesionales por la misma -por supuesto- se recibe un salario mensual, acorde a lo que la regulacion medica profesional lo indica en cada momento
			</div>
			<input type="submit" name="pagina1" value="mas Info">

		</form>
		</td>
		<td>
		<form action="pagina1.php" method="post">
			<div class="textoIntro">
			Hospital DR. Ricardo Gutierrez de La Plata dispone de un sofisticado servicio de guardias medicas las 24 horas para la atencion de distintas urgencias. La administracion de la institucion hace viable una eficiente separacion de los pacientes segun el nivel de seriedad y tipo de patologia
			</div>
			<input type="submit" name="pagina1" value="mas Info">
		</form>
		</td>
		<td>
		<form action="pagina1.php" method="post">
			<div class="textoIntro">
			Acorde a una respetable trayectoria en materia de medicina y salud, en Hospital DR. Ricardo Gutierrez de La Plata podemos encontrar profesionales de las principales especialidades de salud. Del mismo modo, se brinda atencion programada y de urgencias, se realizan estudios medicos y se brinda soporte en muchas ramas comunes de la medicina moderna
			</div>
			<input type="submit" name="pagina1" value="mas Info">
		</form>
		</td>
		</tr>
	</table>
	<div class="contenidoLista">
		<ul>
		<li>
			<form action="pagina1.php" method="post">
				<label> El Hospital </label>
				<div class="textoIntro">
				Este centro de salud tiene un programa de residencia de primer nivel en el pais. Se ofrecen oportunidades de practica intensiva y supervisada en ambitos profesionales por la misma -por supuesto- se recibe un salario mensual, acorde a lo que la regulacion medica profesional lo indica en cada momento
				</div>
				<input type="submit" name="pagina1" value="mas Info">
			</form>
		</li>
		<li>
			<form action="pagina1.php" method="post">
				<label>Guardia</label>
				<div class="textoIntro">
				Hospital DR. Ricardo Gutierrez de La Plata dispone de un sofisticado servicio de guardias medicas las 24 horas para la atencion de distintas urgencias. La administracion de la institucion hace viable una eficiente separacion de los pacientes segun el nivel de seriedad y tipo de patologia
				</div>
				<input type="submit" name="pagina1" value="mas Info">
			</form>
		</li>
		<li>
			<form action="pagina1.php" method="post">
				<label> Especialidades</label>
				<div class="textoIntro">
				Acorde a una respetable trayectoria en materia de medicina y salud, en Hospital DR. Ricardo Gutierrez de La Plata podemos encontrar profesionales de las principales especialidades de salud. Del mismo modo, se brinda atencion programada y de urgencias, se realizan estudios medicos y se brinda soporte en muchas ramas comunes de la medicina moderna
				</div>
				<input type="submit" name="pagina1" value="mas Info">
			</form>
		</li>
	</ul>
	</div>

	<footer >Proyecto de Software 2017 - Hospital Dr. Ricardo Gutierrez</footer>
</body>
</html>
