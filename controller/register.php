<?php  
	
error_reporting(E_ALL);
ini_set('display_errors', '1');

	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");	
	require_once('incluir_twig.php');
	$template=$twig->loadTemplate('register.twig');

	$update = check_permission('user_update');
	$create = check_permission('user_new');
	if($update || $create){
		
		if(isset($_GET['usr']) && $update){

			$user=validate_data($_GET['usr']);
			$info=Repository_User::get_user($user);
			$template->display(array('rol_user'=>$_SESSION['rol'],'user'=>$info[0]));
		}
		else{
			$template->display(array('rol_user'=>$_SESSION['rol']));
		}
	}
	else{
		header('Location:index.php');	
	}
	
?>