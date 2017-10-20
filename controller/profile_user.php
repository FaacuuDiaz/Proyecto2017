<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");

	$ok=check_permission("user_show");

	if($ok){//tiene el permiso necesario para ver el perfil

		$user=Repository_User::get_user($_SESSION['user']);
		$template = $twig -> loadTemplate('register.twig');
		$template -> display(array('rol_user'=>$_SESSION['rol'],'user'=>$user[0]));
	}
	else{
		header('Location:index.php');
	}



?>