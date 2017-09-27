<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_Patient.php");

	if(isset($_SESSION['rol'])){
		$id=validate_data($_GET['ptn']);
		$patien=Repository_Patient::get_patient($id);
		$docs=Repository_Patient::get_TypeDocs();
		$social=Repository_Patient::get_SocialWorks();
		$template=$twig->loadTemplate('register_patient.twig');
		$template->display(array("rol_user"=>$_SESSION['rol'],"patient"=>$patien,"update"=>1,"docs"=>$docs,"social"=>$social));
	}
	else{
		header('Location:index.php');
	}

?>