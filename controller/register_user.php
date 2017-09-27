<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require_once("check_session.php");
	require_once("incluir_twig.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");

	$name=validate_data($_POST['name']);
	$lastname=validate_data($_POST['lastname']);
	$user=validate_data($_POST['user']);
	$pass=validate_data($_POST['pass']);
	$email=validate_data($_POST['email']); //sanitizo los datos para evitar injecciones de algun tipo
	$update=validate_data($_POST['update']);
	if(isset($_SESSION['rol'])){
		if($update = 1) {
			$id=$_SESSION['id'];
			Repository_User::update_user($id,$name,$lastname,$user,$pass,$email);
			$template=$twig->loadTemplate('inicio.html');
			$template->display(array('rol_user'=>$_SESSION['rol']));
		}
	}
	else{
		Repository_User::register_user($name,$lastname,$user,$pass,$email);//registro el usuario en la base de datos
		$usr=Repository_User::get_user($user);
		Repository_User::insert_role(3,$usr[0][0]);//le asigno como rol Recepcionista por defecto

		$template=$twig->loadTemplate('login.html');
		$template->display(array());
	}

?>
