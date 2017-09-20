<?php 
	require_once("incluir_twig.php");
	require_once("check_autentication.php");
	$template= $twig->loadTemplate('inicio.html');
	$template->display(array());
?>	
