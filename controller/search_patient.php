<?php  

	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");
	require_once("validate_data.php");



	$user_index=Repository_Permission::get_id_permission("user_index");
	$ok=Repository_User::can_user($_SESSION['rol_id'],$user_index);


	if($ok){
		$user=validate_data($_POST['user']);
		$list=Repository_User::find_user($user);
		
	
	}



?>