<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("initialize.php");
require_once "incluir_twig.php";
require_once "check_session.php";
require_once "pagination.php";
require_once('../model/Repository_Hospital.php');
require_once('../model/Repository_Pagination.php');
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_Buscador.php";
require_once "validate_data.php";

$ok = check_permission("user_index");

if ($ok) {
    //si el usuario tiene permiso de acceder a esa pagina

    /* verifico que todos los datos del filtro esten seteados y si estan seteados sanitizo los datos para evitar injeccciones xcss */
    if (isset($_GET['page'])) {
        $content = pagination_search_user($_SESSION['id'],$_SESSION['name'],$_SESSION['estado']);
    }
    else{
        $name   = validate_data($_POST['name']);
        $estado = validate_data($_POST['estado']);
        $content = pagination_search_user($_SESSION['id'],$name,$estado);
    
        $_SESSION['name']=$name;
        $_SESSION['estado']=$estado;

    }

    if ($content['content'] != '') {

        $template = $twig->loadTemplate("search_user.twig");
        $template->display(array("general"=>$general, 'user_search' => $content["content"],'actual'=>$content['actual'], 'pages'=>$content['pages'], 'ruta'=>'return_search_user.php'));
    } else {
        $template = $twig->loadTemplate("search_user.twig");
        $template->display(array("general"=>$general));
    }
} else {
    header('Location:index.php');
}
