<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	require_once('check_session.php');
	require_once('incluir_twig.php');
	require_once('pagination.php');
	require_once('../model/Repository_Pagination.php');
	require_once('../model/Repository_Patient.php');
	require_once('../model/Repository_Hospital.php');
	require_once('../model/Repository_Permission.php');
	require_once('../model/Repository_User.php');

	
	$ok = check_permission('user_index');

	if ($ok){

		$content = pagination('users');

		$delete = check_permission('paciente_destroy');

		$t=$twig->loadTemplate('config_users.twig');
    	$tabla=$t->display(array('rol_user'=>$_SESSION['rol'],'users'=>$content["content"], 'delete'=>$delete,'actual'=>$content['actual'], 'pages'=>$content['pages'], 'ruta'=>'config_users.php'));
	}
	else{
		header('Location:index.php');
	}
?>