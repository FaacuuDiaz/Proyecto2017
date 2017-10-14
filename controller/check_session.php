<?php  
	if(!isset($_SESSION['rol'])){
		session_start();
	}

	function check_permission($permission_name){

		if(!isset($_SESSION['rol_id'])){
			return false;
		}

		$permission=Repository_Permission::get_id_permission($permission_name);
		$ok=Repository_User::can_user($_SESSION['rol_id'],$permission);

		return $ok;
	}


?>