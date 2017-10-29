<?php  


	function pagination($nombre){

		if ($nombre == 'patients'){
			$content_cant= sizeof(Repository_Patient::get_allPatients());		
		}
		else{
			$content_cant= sizeof(Repository_User::get_allUsers($_SESSION['id']));
		}
		$data_for_page= Repository_Hospital::get_Pagination_Number();
		$cant_pages=ceil($content_cant/$data_for_page);;

		$actual_page=1;

		if(isset($_GET['page'])){
			$actual_page=$_GET['page'];
		}

		if($actual_page <= 1){
	  		$limit = 0;
	  	}else{
	  		$limit = $data_for_page*($actual_page-1);
	  	}

	  	if ($nombre == 'patients'){
	  		$content = Repository_Pagination::get_Pagination_Patients($limit,$data_for_page);
	  	}
	  	else{
	  		$content = Repository_Pagination::get_Pagination_Users($_SESSION['id'],$limit,$data_for_page);
	  	}

    	return array('content'=>$content,'actual'=>$actual_page, 'pages'=>$cant_pages);
	  }



	  function pagination_search_patient($name,$lastname,$typeDoc,$dni){

	  	$empty=true;
	  	
	  	$data_for_page= Repository_Hospital::get_Pagination_Number();

	  	$actual_page=1;

	  	$content="";

		if(isset($_GET['page'])){
			$actual_page=$_GET['page'];
		}

		if($actual_page <= 1){
	  		$limit = 0;
	  	}else{
	  		$limit = $data_for_page*($actual_page-1);
	  	}

	    if ($name != "" && $lastname == "" && $dni == "" && $typeDoc == -1) {
	        $cant_content = sizeof(Repository_Pagination::search_patient_name($name,0,10000));        
	        $content = Repository_Pagination::search_patient_name($name,$limit,$data_for_page); 
	        $empty           = false;

	    } elseif ($name == "" && $lastname != "" && $dni == "" && $typeDoc == -1) {

	        $cant_content =sizeof(Repository_Pagination::search_patient_lastname($lastname,0,10000));
	        $content = Repository_Pagination::search_patient_lastname($lastname,$limit,$data_for_page);
	        $empty           = false;
	    } elseif ($name == "" && $lastname == "" && $dni != "" && $typeDoc != -1) {
	        $cant_content =sizeof(Repository_Pagination::search_patient_doc($dni, $typeDoc,0,10000));
	        $content =(Repository_Pagination::search_patient_doc($dni, $typeDoc,$limit,$data_for_page));
	        $empty           = false;
	    } elseif ($name != "" && $lastname != "" && $dni == "" && $typeDoc == -1) {
	        $cant_content =sizeof(Repository_Pagination::search_patient_nameLastname($name, $lastname,0,10000));
	        $content =(Repository_Pagination::search_patient_nameLastname($name, $lastname,$limit,$data_for_page));
	        $empty           = false;
	    } elseif ($name != "" && $lastname == "" && $dni != "" && $typeDoc != -1) {
	        $cant_content =sizeof(Repository_Pagination::search_patient_nameDoc($name, $dni, $typeDoc,0,10000));
	        $content =(Repository_Pagination::search_patient_nameDoc($name, $dni, $typeDoc,$limit,$data_for_page));
	        $empty           = false;
	    } elseif ($name == "" && $lastname != "" && $dni != "" && $typeDoc != -1) {
	        $cant_content =sizeof(Repository_Pagination::search_patient_docLastname($dni, $typeDoc, $lastname,0,10000));
	        $content =(Repository_Pagination::search_patient_docLastname($dni, $typeDoc, $lastname,$limit,$data_for_page));
	        $empty           = false;
	    } elseif ($name != "" && $lastname != "" && $dni != "" && $typeDoc != -1) {
	        $cant_content =sizeof(Repository_Pagination::search_patient_tres($name, $lastname, $dni, $typeDoc,0,10000));
	        $content =(Repository_Pagination::search_patient_tres($name, $lastname, $dni, $typeDoc,$limit,$data_for_page));
	        $empty           = false;
	    }
	    if(!$empty){
	    	$cant_pages=ceil($cant_content/$data_for_page);//cantidad de paginas totales
	    }
	    else{ 
	    	$cant_pages = 1;
	    }
	    return array('content'=>$content,'actual'=>$actual_page, 'pages'=>$cant_pages, 'empty'=>$empty);

	  }


	  function pagination_search_user($id,$name,$estado){


	  	$empty=true;
	  	
	  	$data_for_page= Repository_Hospital::get_Pagination_Number();

	  	$actual_page=1;

	  	$content="";

		if(isset($_GET['page'])){
			$actual_page=$_GET['page'];
		}

		if($actual_page <= 1){
	  		$limit = 0;
	  	}else{
	  		$limit = $data_for_page*($actual_page-1);
	  	}

		if ($name != "" && $estado == -1) {
			$cant_content=sizeof(Repository_Pagination::search_user_name($id,$name,0,10000));
	        $content = Repository_Pagination::search_user_name($id,$name,$limit,$data_for_page);
	        $empty       = false;

	    } elseif ($name == "" && $estado != -1) {
	    	$cant_content=sizeof(Repository_Pagination::search_user_estado($id,$estado,0,10000));
	        $content = Repository_Pagination::search_user_estado($id,$estado,$limit,$data_for_page);
	        $empty       = false;
	    } elseif ($name != "" && $estado != -1) {
	    	$cant_content=sizeof(Repository_Pagination::search_user_dos($id,$name,$estado,0,10000));
	        $content = Repository_Pagination::search_user_dos($id,$name, $estado,$limit,$data_for_page);
	        $empty       = false;
	    }

	    if(!$empty){
	    	$cant_pages=ceil($cant_content/$data_for_page);//cantidad de paginas totales
	    }
	    else{ 
	    	$cant_pages = 1;
	    }
	    return array('content'=>$content,'actual'=>$actual_page, 'pages'=>$cant_pages, 'empty'=>$empty);

	  }

	  
?>