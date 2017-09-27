<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");

	if($_SESSION['rol']=='admin'){
		$id=validate_data($_GET['usr']);
		Repository_User::remove_user($id);
		header('Location:config_users.php');
	}
	else{
		header('Location:index.php');
	}


?>