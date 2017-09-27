<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");

	if($_SESSION['rol']=='admin' || $_SESSION['rol']=='pediatra' || $_SESSION['rol']=='recepcionista'){

		$user=Repository_User::get_user($_SESSION['user']);
		$template = $twig -> loadTemplate('profile_user.twig');
		$template -> display(array('rol_user'=>$_SESSION['rol'],'info'=>$user));
	}
	else{
		header('Location:index.php');
	}



?>