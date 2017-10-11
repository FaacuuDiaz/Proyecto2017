<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_DatosDem.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Permission.php";

$dd_update = Repository_Permission::get_id_permission('demographic_update'); //obtengo en id del permiso para eliminar
$update_dd = Repository_User::can_user($_SESSION['rol_id'], $dd_update);

if ($update_dd) {

    $heladera     = validate_data($_POST['Heladera']);
    $electricidad = validate_data($_POST['Electricidad']);
    $mascota      = validate_data($_POST['Mascota']);
    $vivienda     = validate_data($_POST['vivien']);
    $calefaccion  = validate_data($_POST['calef']);
    $agua         = validate_data($_POST['water']);
    $idDatosDem   = validate_data($_POST['dd']);

    Repository_DatosDem::update_datosDem($heladera, $electricidad, $mascota, $vivienda, $calefaccion, $agua, $idDatosDem);

    header('Location:index.php');

} else {
    header('Location:index.php');
}
