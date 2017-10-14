<?php  
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once("incluir_twig.php");
	require_once("check_session.php");
	require_once("../model/Repository_Hospital.php");
	require_once("validate_data.php");
	require_once("../model/Repository_Permission.php");
	require_once("../model/Repository_User.php");

	$config=Repository_Permission::get_id_permission("config");
	$ok=Repository_User::can_user($_SESSION['rol_id'],$config);

	if($ok){

	//echo "entro";
	//if($_SESSION['rol']=='admin'){
		echo isset($_POST['update']);
		//$update=validate_data($_POST['update']);
		if(!isset($_POST['update'])){
			//echo "entro al segundo if";
			$info=Repository_Hospital::get_privateInfo();
			$template=$twig->loadTemplate("config_hospital.twig");
			$template->display(array("rol_user"=>$_SESSION['rol'],"info"=>$info));
		}	
		else{
			$title=validate_data($_POST['title']);
			$descrpt=validate_data($_POST['descrpt']);
			$pagination=validate_data($_POST['pagination']);
			$email=validate_data($_POST['email']);
			$enabled=validate_data($_POST['enabled']);

			Repository_Hospital::update_privateInfo($title,$descrpt,$email,$pagination,$enabled);
			header("Location:config_hospital.php");
		}
	
	}
	else{
		header('Location:index.php');
	}

?>