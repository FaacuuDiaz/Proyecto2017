<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	require_once("initialize.php");
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");

	$roles=Repository_Permission::get_id_permission("roles");
	$ok=Repository_User::can_user($_SESSION['rol_id'],$roles);

	if($ok){ //si el usuario tiene permiso de acceder a esa pagina
		$users=Repository_User::get_usersAndRoles($_SESSION['id']);
		$roles=Repository_User::all_roles();
		$withOutRoles=Repository_User::get_usersWithOutRoles();
		if(sizeof($withOutRoles) > 0){
			$rest_users=adapt_users_without_roles($withOutRoles);
			$users=array_merge($users,$rest_users);	
		}
		sort($users);
		$test = merge_data($users,sizeof($users));	

		$template=$twig->loadTemplate('assingRoles_user.twig');
		$template->display(array("general"=>$general,"users"=>$test,"roles"=>$roles));
	}
	else{
		header('Location:index.php');
	}

?>