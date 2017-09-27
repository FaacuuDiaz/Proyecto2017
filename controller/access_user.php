<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

	require_once("incluir_twig.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Hospital.php");
	//print_r($_SESSION);
	$user=validate_data($_POST['user']);
	$pass=validate_data($_POST['pass']);//sanitizacion de datos

	$exist = Repository_User::check_user($user,$pass); //verifico si existe el usuario

	if($exist){
		
		$habilitado=Repository_Hospital::get_infoEnabled();
		$admin = Repository_User::check_admin($user);

		if($habilitado == 1 || $admin){
			$result = Repository_User::get_user($user);//obtengo la informacion del usuario

			if ($result[0][4] == 0) {
				header("Location:login.php");
			}
			session_start();
			$_SESSION['id']=$result[0][0];
			$_SESSION['nombre']=$result[0][7].' '.$result[0][8];
			$_SESSION['user']=$result[0][2];
			$mi_rol=Repository_User::get_role($_SESSION['id']);

			$_SESSION['rol']=$mi_rol;

			header("Location:index.php");
			
			//$template = $twig->loadTemplate('inicio.html');
		}	//$template -> display(array('rol_user'=> $mi_rol));
		else {
			header("Location:index.php");
		}
	
	}
	else{
		header("Location:login.php");
	}
	
	
?>
