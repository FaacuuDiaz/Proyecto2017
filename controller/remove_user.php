<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");
	require_once "../model/Repository_Permission.php";


	/*$user_destroy=Repository_Permission::get_id_permission('user_destroy');//obtengo en id del permiso para eliminar
	$destroy_user = Repository_User::can_user($_SESSION['rol'],$user_destroy);//verifico si el rol puede eliminar un usuario*/

	$ok=check_permission('user_destroy');
	if($ok && validate_string($_GET['usr'])){
		$id=validate_data($_GET['usr']);
		Repository_User::remove_user($id);
		header('Location:config_users.php');
	}
	else{
		header('Location:index.php');
	}


?>