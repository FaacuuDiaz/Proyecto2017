<!DOCTYPE html>
<html>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/formularioPR.css">
	<link rel="stylesheet" type="text/css" href="../css/footerR.css">

<head>
	<title>Registrar Paciente</title>
</head>
<body>
	<header><h1>Hospital Gutierrez</h1></header>
	<nav>
		<ul>
			<li><a href="../index.php">Inicio</a></li>
		</ul>
	</nav>
	<p>Registrar Paciente</p>

	<form>
		<div style="width:50%; float:left;">
 		Nombre: <input type="text" name="name" placeholder="Ingrese el Nombre">
		Apellido: <input type="text" name="lastname" placeholder="Ingrese el Apellido">
		DNI: <input type="text" name="dni" placeholder="Ingresa el dni">
		Obra Social: <input type="text" name="user" placeholder="Ingrese la obra social">
		Numero de Afiliado: <input type="text" name="pass" placeholder="Ingrese el numero de afiliado">
		</div>
		<div style="width:50%; float:left;">
		Email: <input type="email" name="email" placeholder="ejemplo@gmail.com">
		Fecha de Nacimiento: <input type="date" name="nacimiento">
		Telefono: <input type="text" name="telefono" placeholder="Ingresa el telefono">
		Direccion: <input type="text" name="direccion" placeholder="Ingresa la direccion">
		</div>
		<input type="submit" name="submit">
	</form>

	<footer>Pilis@2017all Rights Reserved</footer>
</body>
</html>
