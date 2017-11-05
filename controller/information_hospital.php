<?php 
	require_once "check_session.php";
	require_once('incluir_twig.php');
	require_once("../model/Repository_Hospital.php");
	require_once("initialize.php");
	$info=Repository_Hospital::get_privateInfo();

	if(isset($_SESSION['rol'])){
		$template=$twig->loadTemplate('information_hospital.twig');
		$template->display(array('general'=>$general,'info'=>$info[0]));
	}
	else {
		$template=$twig->loadTemplate('information_hospital.twig');
		$template->display(array('info'=>$info[0]));
	}

?>