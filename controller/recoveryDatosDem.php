<?php

//cambiarle el nombre a esto porque lo que hace es devolver la info para mostrarla en el coso de actualizar

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_DatosDem.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Permission.php";

/*$dd_update = Repository_Permission::get_id_permission('demographic_update'); //obtengo en id del permiso para eliminar
$update_dd = Repository_User::can_user($_SESSION['rol_id'], $dd_update);*/

$update_dd=check_permission('demographic_update');

if ($update_dd) {
    $id          = validate_data($_GET['dd']);
    $datosDem    = Repository_DatosDem::get_updateDatosDem($id);
    $calefaccion = Repository_DatosDem::get_tipoCalefaccion();
    $agua        = Repository_DatosDem::get_tipoAgua();
    $vivienda    = Repository_DatosDem::get_tipoVivienda();

    $template = $twig->loadTemplate('updateDatosDem.twig');
    $template->display(array("rol_user" => $_SESSION['rol'], "datosDem" => $datosDem, "calefaccion" => $calefaccion, "agua" => $agua, "vivienda" => $vivienda));
} else {
    header('Location:index.php');
}
