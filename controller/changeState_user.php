<?php 

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");

	$user_update=Repository_Permission::get_id_permission("user_update");
	$ok=Repository_User::can_user($_SESSION['rol_id'],$user_update);

	if($ok){ //si el usuario tiene permiso de acceder a esa pagina
		$id= validate_data($_GET['usr']);
		$value= validate_data($_GET['state']);
		if( $value == 1 ) {
			Repository_User::changeState_user($id,0);
		}
		else{
			Repository_User::changeState_user($id,1);
		}
		header('Location:config_users.php');
		
	}

?>