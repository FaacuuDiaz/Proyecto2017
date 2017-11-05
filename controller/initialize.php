<?php 

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	require_once('check_session.php');
	require_once('../model/Repository_Hospital.php');
	require_once('../model/Repository_Permission.php');
	require_once('../model/Repository_User.php');

	$title=['title'=>Repository_Hospital::get_Title()];
	$all_roles_for_user=Repository_User::get_id_roles($_SESSION['id']);//si el usuario tiene mas de 1 rol 
	$general=[];
	if (sizeof($all_roles_for_user)>1){ //si el usuario tiene mas de un permiso
	
		foreach ($all_roles_for_user as $key) {

			$arg=Repository_Permission::get_permission_for_rol($key[0]);
			$permiso=array_column($arg, 'nombre');
			$general=array_merge($general,$permiso);

		}
		$general=array_unique($general);

	}
	else{
		$permission_for_user= Repository_Permission::get_permission_for_rol($_SESSION['rol_id']);
		$general=array_column($permission_for_user, 'nombre');
	}	 

	$auxiliar=[];
	foreach ($general as $al) {
		array_push($auxiliar, true);
	}
	$general= array_combine($general,$auxiliar);
	$general=array_merge($general,$title);

?>