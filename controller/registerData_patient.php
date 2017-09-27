<?php  
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_Patient.php");

	if(isset($_SESSION['rol'])){
		$name=validate_data($_POST['name']);
		$lastname=validate_data($_POST['lastname']);
		$address=validate_data($_POST['address']);
		$date=validate_data($_POST['date']);
		$gender=validate_data($_POST['gender']);
		$typeDoc=validate_data($_POST['typeDoc']);
		$dni=validate_data($_POST['dni']);
		$phone=validate_data($_POST['phone']);
		$socialWork=validate_data($_POST['socialWork']);

		$update=validate_data($_POST['updt']);

		if($update==1){
			$id=validate_data($_POST['ptn']);
			Repository_Patient::update_patient($id,$name,$lastname,$address,$date,$gender,$typeDoc,$dni,$phone,$socialWork);
		}
		else{
			Repository_Patient::insert_patient($name,$lastname,$address,$date,$gender,$typeDoc,$dni,$phone,$socialWork);
		}
		header('Location:list_patient.php');
	}
	else{
		header('Location:index.php');
	}
	

?>