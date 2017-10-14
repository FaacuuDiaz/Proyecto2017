<?php 
	
	require_once('incluir_twig.php');
	require_once("../model/Repository_Hospital.php");
	$info=Repository_Hospital::get_privateInfo();

	$template=$twig->loadTemplate('information_hospital.twig');
	$template->display(array('info'=>$info[0]))

?>