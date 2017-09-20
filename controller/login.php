<?php  
	require('incluir_twig.php');
	$template = $twig->loadTemplate('login.html');
	$template -> display(array());
?>