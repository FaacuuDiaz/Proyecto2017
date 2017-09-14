<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/formularioTurno.css">

<head>
	<title>Inicio</title>
</head>
<body>
	<header><h1>Hospital Gutierrez</h1></header>
	<p>Bienvenido Usuario Comun</p>
	<nav class="menu">
	<div>
		<ul>
			<li><a href="../index.php">Cerrar Sesion</a></li>
			<li class="submenu"><a>Pacientes</a>
				<ul class="hijo">
					<li><a href="./pacienteRegistrar.php">Alta Paciente</a></li>
					<li><a href="./pacienteListar.php">Listar Paciente</a></li>
				</ul>
			</li>
<form id="searchform" action="./busquedaPaciente.php">
<input type="text" placeholder="Buscar..."/><button type="submit">Ir</button>
</form>
	</ul></nav>
	<p>Turno</p>
	<form id="formulario">
	<div style="width:50%; float:left;">
		Nombre: <input type="text" name="name" placeholder="Ingrese el Nombre">
		Apellido: <input type="text" name="lastname" placeholder="Ingrese el Apellido">
		Obra Social: <input type="text" name="user" placeholder="Ingrese la obra social">
		Numero de Afiliado: <input type="text" name="pass" placeholder="Ingrese el numero de afiliado">
		</div>
		<div style="width:50%; float:left;">
		Telefono: <input type="text" name="telefono" placeholder="Ingresa el telefono">
		Doctor: <input type="text" name="pass" placeholder="Ingrese la contraseña">
		Fecha: <input type="date" name="nacimiento">
		Hora: <input type="time" name="hora">
		<br/>

		<input type="submit" name="submit">
		</div>
	</form>
	<footer class="footer">PilisCercato@2017all Rights Reserved</footer>
</body>
</html>
