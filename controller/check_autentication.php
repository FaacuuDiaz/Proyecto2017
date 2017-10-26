<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once("check_session.php");
	require_once('incluir_twig.php');
	require_once("../model/Repository_Hospital.php");
	require_once("../model/Repository_Permission.php");
	require_once("../model/Repository_User.php");


	$ok=check_permission("config"); //chequeo si el usuario tiene el permiso

	$habilitado=Repository_Hospital::get_infoEnabled();//verifico si la pagina no esta blockeada
	
	if ($habilitado==1 || $ok ){
		if(isset($_SESSION['rol'])){
			$mi_rol=$_SESSION['rol'];
			$titulo=Repository_Hospital::get_Title();
			$template = $twig -> loadTemplate('inicio.twig');
			$template -> display(array('rol_user'=>$mi_rol));
		}
		else{
			$template= $twig->loadTemplate('inicio.twig');
			$template->display(array());
		}
	}	
	else{
		$template= $twig->loadTemplate('blocked.twig');
		$template->display(array());
	}	
?>
