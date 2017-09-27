<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_Patient.php");

	if(isset($_SESSION['rol'])){
		$patiens=Repository_Patient::get_allPatients();
		$template=$twig->loadTemplate('list_patient.twig');
		$template->display(array("rol_user"=>$_SESSION['rol'],"patients"=>$patiens));
	}
	else{
		header('Location:index.php');
	}

?>