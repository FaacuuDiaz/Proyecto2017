<?php  
	require('incluir_twig.php');
	$template = $twig->loadTemplate('login.twig');
	$template -> display(array());
?>