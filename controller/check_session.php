<?php  
	if(!isset($_SESSION['rol'])){
		session_start();
	}


	function check_permission($permission_name){
		$ret=false;
		if(isset($_SESSION['id'])){
			$id_permission=Repository_Permission::get_id_permission($permission_name);
			$permissions=Repository_User::get_id_roles($_SESSION['id']);
			if(sizeof($permissions) > 1 ){
				for($i=0;$i<sizeof($permissions);$i++) {
					if (Repository_User::can_user($permissions[$i][0],$id_permission)){
						$ret=true;
						break;
					}	
				}
			}
			else{
				$ret=evaluate_permission($permission_name);
			}
		}	
		return $ret;
	}


	function evaluate_permission($permission_name){

		if(!isset($_SESSION['rol_id'])){
			return false;
		}

		$permission=Repository_Permission::get_id_permission($permission_name);
		$ok=Repository_User::can_user($_SESSION['rol_id'],$permission);

		return $ok;
	}

	function merge_data($data,$count){
		$array=[];
		
		$i=0;
		while ($count > $i){
			$person=$data[$i];
			$index = $data[$i][0];
			$roles="";
			while($count > $i && $index == $data[$i][0]) {
				$roles = $roles.'/'.$data[$i]['nombre_rol'];
				$i++;
			}
			$person['nombre_rol']=$roles.'/';
			array_push($array, $person);
		}
		
		return $array;	
	}

	function adapt_users_without_roles($data){
		$array=[];
		for($i=0;count($data)>$i;$i++){
			$b=array_merge($data[$i],array('id_rol'=>0,'nombre_rol'=>'ninguno'));
			array_push($array,$b);
		}
		return $array;

	}


?>