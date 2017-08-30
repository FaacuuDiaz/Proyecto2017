<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
<head>
	<title>Inicio</title>
</head>
<body>
	<header><h1>Hospital Gutierrez</h1></header>
	<p>Bienvenido Usuario Admin</p>
	<nav class="menu">
		<ul>
			<li><a href="../index.php">Cerrar Sesion</a></li>
			<li class="submenu"><a>Pacientes</a>
				<ul>
					<li><a href="./pacienteRegistrar.php">Alta Paciente</a></li>
					<li><a href="./pacienteListar.php">Listar Paciente</a></li>
				</ul>
			</li>
			<li class="submenu"><a>Usuarios</a>
				<ul>
					<li><a href="./registrarse.php">Alta Usuario</a></li>
					<li><a href="./usuarioListar.php">Listar Usuarios</a></li>

				</ul>
			</li>
			<li><a href="./darTurno.php">Turnos</a></li>
			<form id="searchform" action="./busquedaPaciente.php">
<input type="text" placeholder="Buscar..."/><button type="submit">Ir</button>
</form>
		</ul>
	</nav>

	<footer class="footer">PilisCercato@2017all Rights Reserved</footer>
</body>
</html>
