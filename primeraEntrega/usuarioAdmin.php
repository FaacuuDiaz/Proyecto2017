<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no ,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/botonBuscar.css">
	<link rel="stylesheet" type="text/css" href="../css/contenido.css">

	<title>Inicio</title>
</head>
<body>
	<header><h1>Hospital Dr. Ricardo Gutierrez</h1></header>
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
					<li><a href="./registrarse.php">Registrar</a></li>
					<li><a href="#">Roles</a></li>
					<li><a href="#">Permisos</a></li>
					<li><a href="./usuarioListar.php">Listar Usuarios</a></li>
					<li><a href="#">Configuracion</a></li>

				</ul>
			</li>
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
	<div class="contenido"> <!-- style="margin-top: 100px"> -->
		Bienvenido al sistema de gestion de pacientes y usuarios de el Hospital, ante cualquier incomveniente o duda puede revisar el FAQ's , y  en caso de no encontrar respuesta puede mandar un mail al departamento de sistemas del Hospital.
	</div>
	<footer class="footer">Proyecto de Software 2017 - Hospital Dr. Ricardo Gutierrez</footer>
</body>
</html>
