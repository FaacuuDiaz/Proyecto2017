<?php  

	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	require_once("initialize.php");
	require_once('check_session.php');
	require_once('incluir_twig.php');
	require_once('pagination.php');
	require_once('../model/Repository_Pagination.php');
	require_once('../model/Repository_Patient.php');
	require_once('../model/Repository_Hospital.php');
	require_once('../model/Repository_Permission.php');
	require_once('../model/Repository_User.php');


	$ok = check_permission('paciente_index');

	if ($ok){

		$content = pagination('patients');

		$delete = check_permission('paciente_destroy');
		$pacientes=$content['content'];
		$content['content']=get_data_API_patient($pacientes);//busco y macheo los datos de la api con los del pacientes

		$t=$twig->loadTemplate('list_patient.twig');
    	$tabla=$t->display(array('general'=>$general,'patients'=>$content["content"], 'delete'=>$delete,'actual'=>$content['actual'], 'pages'=>$content['pages'], 'ruta'=>'list_patient.php'));
	}
	else{
		header('Location:index.php');
	}

?>