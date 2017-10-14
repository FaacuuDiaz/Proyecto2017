<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	require_once("check_session.php");
	require_once("incluir_twig.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");	

	$ok=check_permission("user_index");// verifico si tiene el permiso indicado
	if($ok){
		$users=Repository_User::get_allUsers($_SESSION['id']);
		$template= $twig -> loadTemplate('config_users.twig');
		$template-> display(array('rol_user'=>$_SESSION['rol'], 'users' => $users));
	}
	else{
		header('Location:index.php');
	}
?>