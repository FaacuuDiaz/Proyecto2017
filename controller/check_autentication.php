<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once("check_session.php");
	require_once('incluir_twig.php');
	require_once("../model/Repository_Hospital.php");
	//print_r($_SESSION);
	$habilitado=Repository_Hospital::get_infoEnabled();
	$admin=isset($_SESSION['rol']);
	$ok=false;
	if($admin == 1){
		$ok = $admin == 'admin';
	}
	
	if ($habilitado==1 || $ok ){
		if(isset($_SESSION['rol'])){
			$mi_rol=$_SESSION['rol'];
			$template = $twig -> loadTemplate('inicio.html');
			$template -> display(array('rol_user'=>$mi_rol));
		}
		else{
			$template= $twig->loadTemplate('inicio.html');
			$template->display(array());
		}
	}	
	else{
		$template= $twig->loadTemplate('blocked.html');
		$template->display(array('rol_user'=>'blocked'));
	}	
?>
