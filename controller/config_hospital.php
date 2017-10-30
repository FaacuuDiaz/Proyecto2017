<?php  
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_Hospital.php");
	require_once("validate_data.php");
	require_once("../model/Repository_Permission.php");
	require_once("../model/Repository_User.php");

	$ok=check_permission('config');

	if($ok){

		if(!isset($_POST['update'])){

			$info=Repository_Hospital::get_privateInfo();
			$template=$twig->loadTemplate("config_hospital.twig");
			$template->display(array("rol_user"=>$_SESSION['rol'],"info"=>$info));
		}	
		else {
			$right=(validate_string($_POST['title']) && validate_string($_POST['descrpt']) && validate_string($_POST['pagination']) && validate_string($_POST['email']) && validate_string($_POST['enabled']));
			if($right) {
			
			$title=validate_data($_POST['title']);
			$descrpt=validate_data($_POST['descrpt']);
			$pagination=validate_data($_POST['pagination']);
			$email=validate_data($_POST['email']);
			$enabled=validate_data($_POST['enabled']);

			Repository_Hospital::update_privateInfo($title,$descrpt,$email,$pagination,$enabled);
			header("Location:config_hospital.php");
			}
			else{
				header('Location:index.php');	
			}
	
		}
	}	
	else{
		header('Location:index.php');
	}

?>