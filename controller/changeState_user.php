<?php 

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_User.php");

	if($_SESSION['rol']=='admin'){
		$id= validate_data($_GET['usr']);
		$value= validate_data($_GET['state']);
		if( $value == 1 ) {
			echo 'entro al if';
			Repository_User::changeState_user($id,0);
		}
		else{
			echo "entro al else";
			Repository_User::changeState_user($id,1);
		}
		header('Location:config_users.php');
		
	}

?>