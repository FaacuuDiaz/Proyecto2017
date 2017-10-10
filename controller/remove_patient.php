<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

	require_once("check_session.php");
	require_once("validate_data.php");
	require_once("../model/Repository_Patient.php");
	require_once "../model/Repository_User.php";
	require_once("../model/Repository_Permission");

	$patient_destroy=Repository_Permission::get_id_permission('patient_destroy');//obtengo en id del permiso para eliminar
	$destroy_patient = Repository_User::can_user($_SESSION['rol'],$patient_destroy);//verifico si el rol puede eliminar un paciente
	if($destroy_patient){ // si tiene el permiso donde puede eliminar un paciente
		$id=validate_data($_GET['ptn']);
		Repository_Patient::remove_patient($id);
		header('Location:list_patient.php');
	}
	else{
		header('Location:index.php');
	}


?>