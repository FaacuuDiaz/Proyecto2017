<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");
	require_once "../model/Repository_Permission.php";

	$ok=check_permission('user_update');
	if($ok){
		$user_id=validate_data($_POST['id']);
		$rol=validate_data($_POST['rol']);

		if(isset($_POST['agregar'])){
			Repository_User::insert_role_user($rol,$user_id);
		}
		else{
			Repository_User::remove_role_user($rol,$user_id);
		}
		header('Location:assingRoles_user.php');
		
	}
	else{
		header('Location:index.php');
	}

	
?>