<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("initialize.php");
require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Permission.php";

/*$update_patient = Repository_Permission::get_id_permission('paciente_update'); //obtengo en id del permiso para actualizar
$patient_update = Repository_User::can_user($_SESSION['rol_id'], $update_patient); //verifico si el rol puede actualizar un usuario*/
$patient_update= check_permission('paciente_update');

if ($patient_update) {
    $id       = validate_data($_GET['ptn']);
    $patien   = Repository_Patient::get_patient($id);
    $docs     = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-documento');
    $social   = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/obra-social');
    $template = $twig->loadTemplate('register_patient.twig');
    $template->display(array("general"=>$general, "patient" => $patien, "update" => 1, "docs" => $docs, "social" => $social));
} else {
    header('Location:index.php');
}
