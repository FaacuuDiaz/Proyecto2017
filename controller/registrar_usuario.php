<?php  
	require_once("incluir_twig.php");
	require_once("validar_datos.php");
	$name=$_POST['name'];
	$lastaname=$_POST['lastname'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$email=$_POST['email'];

	DataControl::validate_data($name,$lastname,$user,$pass,$email); //valido los datos para evitar injecciones de algun tipo
	User::register_user($name,$lastname,$user,$pass,$email);//registro el usuario en la base de datos

	$template=$twig->loadTemplate('index.html');
	$template->display(array());


?>