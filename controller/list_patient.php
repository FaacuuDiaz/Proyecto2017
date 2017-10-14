<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_Patient.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");


	$delete=check_permission('paciente_destroy');//verifico si el usuario puede eliminar un paciente
	/*$paciente_index=Repository_Permission::get_id_permission("paciente_index");
	$ok=Repository_User::can_user($_SESSION['rol_id'],$paciente_index);*/
	$ok=check_permission("paciente_index");
	if($ok){
	//if(isset($_SESSION['rol'])){
		$patiens=Repository_Patient::get_allPatients();
		$template=$twig->loadTemplate('list_patient.twig');
		$template->display(array("rol_user"=>$_SESSION['rol'],"patients"=>$patiens, 'delete'=>$delete));
	}
	else{
		header('Location:index.php');
	}

?>