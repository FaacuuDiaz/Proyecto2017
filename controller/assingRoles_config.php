<?php  
	
	require_once("validate_data.php");
	require_once("check_session.php");
	require_once("incluir_twig.php");
	require_once("../model/Repository_User.php");
	require_once("../model/Repository_Permission.php");


	$ok=check_permission('user_update');

	if(isset($_SESSION['rol']) && $ok){ //si es que puede actualizar al usuario
		$template=$twig->loadTemplate('assingRoles_config.twig');
		
		$id=validate_data($_GET['usr']);//el id del usuario en cuestion que quiero agregar los roles
		$accept=true;
		if(isset($_GET['sum'])){
			$accept= validate_integer($_GET['sum']); // si esl valor que optengo es el deseado
		}
		if(validate_integer($id) && $accept){	
			if ($accept){				
				$roles=Repository_User::get_missing_roles($id);
				$texto='agregar';
			}
			else{
				$texto='quitar';
				$roles=Repository_User::get_roles_user($id);
			}

			$template->display(array('rol_user'=>$_SESSION['rol'],'id'=>$id,'roles'=>$roles,'empty'=>sizeof($roles)==0,'text'=>$texto));
		}
		else{
			header('Location:index.php');
		}	
	}
	else{
		header('Location:index.php');
	}



?>