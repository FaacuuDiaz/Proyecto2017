<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");
	require_once "../model/Repository_Permission.php";


	$user_update=Repository_Permission::get_id_permission('user_update');//obtengo en id del permiso para eliminar
	$update_user = Repository_User::can_user($_SESSION['rol'],$user_update);//verifico si el rol puede eliminar un usuario

	if($update_user){
		$user_id=validate_data($_POST['id']);
		$rol=validate_data($_POST['rol']);

		Repository_User::update_role($rol,$user_id);

		header('Location:assingRoles_user.php');
		
	}
	else{
		header('Location:index.php');
	}

	
?>