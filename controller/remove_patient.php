<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_Patient.php");

	if(isset($_SESSION['rol'])){
		$id=validate_data($_GET['ptn']);
		Repository_Patient::remove_patient($id);
		header('Location:list_patient.php');
	}
	else{
		header('Location:index.php');
	}


?>