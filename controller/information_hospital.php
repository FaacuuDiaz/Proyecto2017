<?php 
	require_once "check_session.php";
	require_once('incluir_twig.php');
	require_once("../model/Repository_Hospital.php");
	$info=Repository_Hospital::get_privateInfo();

	if(isset($_SESSION['rol'])){
		$template=$twig->loadTemplate('information_hospital.twig');
		$template->display(array('rol_user'=>$_SESSION['rol'],'info'=>$info[0]));
	}
	else {
		$template=$twig->loadTemplate('information_hospital.twig');
		$template->display(array('info'=>$info[0]));
	}

?>