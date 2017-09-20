<?php  
	
	require_once("incluir_twig");
	session_start();

	if(isset($_SESSION['id']='admin')){
		$template = $twig -> loadTemplate("backend_admin.html");
		$template->display(array()); 
	}
?>
