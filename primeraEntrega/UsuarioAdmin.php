<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/menuAdmin.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/formularios.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
<head>
	<title>Inicio</title>
</head>
<body>
	<header><h1>El titulo de INICIO que se te cante</h1></header>
	<p>Bienvenido Usuario Admin</p>
	<nav>
		<ul>
			<li><a href="../index.php">Cerrar Sesion</a></li>
			<li class="submenu"><a>Pacientes</a>
				<ul class="hijo">
					<li><a href="/primeraEntrega/altaPaciente.php">Alta Paciente</a></li>
					<li><a href="/primeraEntrega/bajaPaciente.php">Baja Paciente</a></li>
					<li><a href="/primeraEntrega/modificarPaciente.php">Modificacion Paciente</a></li>
				</ul>
			</li>
			<li class="submenu"><a>Usuarios</a>
				<ul class="hijo">
					<li><a href="/primeraEntrega/altaUsuario.php">Alta Usuario</a></li>
					<li><a href="/primeraEntrega/bajaUsuario.php">Baja Usuario</a></li>
					<li><a href="/primeraEntrega/modificarUsuario.php">Modificacion Usuario</a></li>
				</ul>
			</li>
		</ul>
	</nav>

	<footer class="footer">PilisCercato@2017all Rights Reserved</footer>
</body>
</html>
