<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/botonBuscar.css">
	<link rel="stylesheet" type="text/css" href="../css/contenido.css"></li>
<head>
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
			<form id="searchform" action="primeraEntrega/busquedaPaciente.php">
				<input type="text" placeholder="Buscar..."/>
				<button>Ir</button>
			</form>
		</ul>
	</nav>
	<div style="margin-top: 100px">
		Bienvenido al sistema de gestion de pacientes y usuarios de el Hospital, ante cualquier incomveniente o duda puede revisar el FAQ's , y  en caso de no encontrar respuesta puede mandar un mail al departamento de sistemas del Hospital.
	</div>
	<footer class="foot">Proyecto de Software 2017 - Hospital Dr. Ricardo Gutierrez</footer>
</body>
</html>
