<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_DatosDem.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Permission.php";

/*$dd_destroy = Repository_Permission::get_id_permission('demographic_destroy'); //obtengo en id del permiso para eliminar
$destroy_dd = Repository_User::can_user($_SESSION['rol_id'], $dd_destroy); //verifico si el rol puede eliminar el dd*/

$destroy_dd=check_permission('demographic_destroy');
if ($destroy_dd) {
    // si tiene el permiso donde puede eliminar un dd
    $id = validate_data($_GET['dd']);
    Repository_DatosDem::remove_datosDem($id);

    //deberia actualizar el dd del paciente?

    header('Location:list_patient.php');
} else {
    header('Location:index.php');
}
