<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require_once('check_session.php');
	require_once('incluir_twig.php');
	require_once('../model/Repository_Pagination.php');
	require_once('../model/Repository_Patient.php');
	require_once('../model/Repository_Hospital.php');
	require_once('../model/Repository_Permission.php');
	require_once('../model/Repository_User.php');

	$users_cant= sizeof(Repository_Patient::get_allPatients());
	$data_for_page= 2;
	$cant_pages=ceil($users_cant/$data_for_page);;

	$actual_page=1;
	if(isset($_POST['page'])){
		$actual_page=$_POST['page'];
	}

	if($actual_page < $cant_pages){
		$after = true;
	}

	if($actual_page <= 1){
  		$limit = 0;
  	}else{
  		$limit = $data_for_page*($actual_page-1);
  	}

  	$patients = Repository_Pagination::get_Pagination_Patients($limit,$data_for_page);

	$delete=check_permission('paciente_destroy');//verifico si el usuario puede eliminar un paciente
    
	$template=$twig->loadTemplate('pagination_patients.twig');
	$template->display(array("rol_user"=>$_SESSION['rol']));


	$t=$twig->loadTemplate('table_pagination_patients.twig');
    $tabla=$t->display(array("patients"=>$patients, 'delete'=>$delete));

    $l=$twig->loadTemplate('links_pagination.twig');

    $links= $l->display(array('actual'=>$actual_page, 'pages'=>$cant_pages));
    
    echo json_encode(array('tabla' => $tabla, 'links' => $links));

?>