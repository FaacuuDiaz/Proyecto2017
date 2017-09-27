<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_User.php");

	if($_SESSION['rol']=='admin'){
		$users=Repository_User::get_usersAndRoles($_SESSION['id']);
		$roles=Repository_User::all_roles();
		$template=$twig->loadTemplate('assingRoles_user.html');
		$template->display(array("rol_user"=>$_SESSION['rol'],"users"=>$users,"roles"=>$roles));
	}
	else{
		header('Location:index.php');
	}

?>