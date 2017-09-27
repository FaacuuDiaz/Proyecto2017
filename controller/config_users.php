<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	if(!isset($_SESSION['rol'])){
		session_start();
	}
	require_once("incluir_twig.php");
	require_once("../model/Repository_User.php");
	$mi_rol=$_SESSION['rol'];
	if($mi_rol == 'admin'){
		$users=Repository_User::get_allUsers($_SESSION['id']);
		$template= $twig -> loadTemplate('config_users.twig');
		$template-> display(array('rol_user'=>$mi_rol, 'users' => $users));
	}
	else{
		header('Location:index.php');
	}
?>