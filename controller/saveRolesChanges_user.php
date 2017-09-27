<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");

	if($_SESSION['rol']=='admin'){
		$user_id=validate_data($_POST['id']);
		$rol=validate_data($_POST['rol']);

		Repository_User::update_role($rol,$user_id);

		header('Location:assingRoles_user.php');
		
	}
	else{
		header('Location:index.php');
	}

	
?>