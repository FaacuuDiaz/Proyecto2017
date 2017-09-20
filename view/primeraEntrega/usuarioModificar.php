<!DOCTYPE html>
<html>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/formularios.css">
	<link rel="stylesheet" type="text/css" href="../css/footerR.css">

<head>
	<title>Registrarse</title>
</head>
<body>
	<header><h1>Hospital Gutierrez</h1></header>
	<nav class="menu">
		<ul>
			<li><a href="usuarioAdmin.php">Inicio</a></li>
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
		</ul>
	</nav>
	<p>Modificar Usuario</p>
	<form>
		Nombre: <input type="text" name="name" placeholder="Ingrese el Nombre">
		Apellido: <input type="text" name="lastname" placeholder="Ingrese el Apellido">
		Usuario: <input type="text" name="user" placeholder="Ingrese el usuario">
		Contraseña: <input type="text" name="pass" placeholder="Ingrese la contraseña">
		Email: <input type="email" name="email" placeholder="ejemplo@gmail.com">
		Fecha de Nacimiento: <input type="date" name="nacimiento">

		<input type="submit" name="submit" value="guardar cambios">
	</form>
	<footer>Pilis@2017all Rights Reserved</footer>
</body>
</html>
