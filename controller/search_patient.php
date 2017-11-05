<?php  
	require_once("initialize.php");
	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_Permission.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Patient.php");
	$paciente_index=Repository_Permission::get_id_permission("paciente_index");
	$ok=Repository_User::can_user($_SESSION['rol_id'],$paciente_index);

	if($ok){ //si el usuario tiene permiso de acceder a esa pagina 
		$docs   = Repository_Patient::get_TypeDocs();
		$template = $twig ->loadTemplate("search_patient.twig");
		$template->display(array("general"=>$general,"docs" => $docs));

	}
	else{
		header('Location:index.php');
	}


?>