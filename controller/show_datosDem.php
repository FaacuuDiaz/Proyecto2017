<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("initialize.php");
require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";

require_once "../model/Repository_DatosDem.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Permission.php";

/*$dd_show = Repository_Permission::get_id_permission('demographic_show'); //obtengo en id del permiso para mostrar
$show_dd = Repository_User::can_user($_SESSION['rol_id'], $dd_show); //verifico si el rol puede mostrar el dd*/

$show_dd=check_permission('demographic_show');
if ($show_dd) {
    // si tiene el permiso donde puede mostar un dd
    $id       = validate_data($_GET['ptn']);
    $datosDem = Repository_DatosDem::get_datosDem($id);
    $template = $twig->loadTemplate('showDatosDem.twig');
    $template->display(array("general"=>$general, "datosDem" => $datosDem));
} else {
    header('Location:index.php');
}
