<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	if(!isset($_SESSION['rol'])){
		session_start();
	}
	require_once("incluir_twig.php");
	require_once("../model/Repository_User.php");
	require_once("..model/Repository_Permission.php");	
	$user_update=Repository_Permission::get_id_permission("user_update");
	$ok=Repository_User::can_user($_SESSION['rol_id'],$user_update);

	if($ok){




	//$mi_rol=$_SESSION['rol'];
	//if($mi_rol == 'admin'){
		$users=Repository_User::get_allUsers($_SESSION['id']);
		$template= $twig -> loadTemplate('config_users.twig');
		$template-> display(array('rol_user'=>$_SESSION['rol'], 'users' => $users));
	}
	else{
		header('Location:index.php');
	}
?>